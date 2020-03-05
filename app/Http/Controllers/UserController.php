<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getRegist(){
        return view('register');
    }
    public function getLogin(){
        return view('login');
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:8',
            'email' => 'required|unique:users|regex:/^[\w.+\-]+@sis.hust.edu.vn$/',
            'password' => [
                'required',
                'min:6'
            ],
            're_password' => 'required|same:password'
        ]);
        $sv_new = array(
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'student'
        );

        $sv = User::create($sv_new);

        if ( $sv ) {
            return redirect('login')->with('login-success', 'Register successful, please login into system!');
        } else {
            return redirect()->to('register');
        }
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        $user = User::where('username', $request->username)
            ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['role' => $user->role]);
            session(['user' => $user]);
            return redirect()->route('slat');
        }
        return redirect('login')->with('login-error', 'Username or password incorrect!');

    }

    public function forgotPassword(Request $request) {
        //Tạo token và gửi đường link reset vào email nếu email tồn tại
        $email = $request->email;
        $result = User::where('email', $email )->first();
        if($result){
            $resetPassword = ResetPassword::firstOrCreate(
                [
                    'email'=>$email,
                    'token'=>Str::random(60),
                    'time_expire' => date('Y-m-d H:i:s', strtotime("+5 hours"))
                ]
            );

            $token = ResetPassword::where('email', $email)->first();

            $data = ['link' => 'http://laravel.slat.com/reset-password?token=' . $token->token];
            Mail::send('email', $data , function($message) use ($email){
                $message->from('laravel.slat@gmail.com', 'SLaT');
                $message->to( $email, 'User in SLaT')->subject('Forgot password in Support Learning and Teaching');
            });
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function resetPassword(Request $request) {
        // Check token valid or not
        $result = ResetPassword::where('token', $request->token)->first();

        $data['info'] = $result->token;
        $now = strtotime("now");

        if($result && $now < strtotime($result->time_expire)){
            return view('newPass', $data);
        } else {
            echo 'This link is expired';
        }
    }

    public function newPassword(Request $request) {
        $validatedData = $request->validate([
            'password' => [
                'required',
                'min:6'
            ],
            're_password' => 'required|same:password'
        ]);

        // Check password confirm
        if($request->password == $request->re_password){
            // Check email with token
            $result = ResetPassword::where('token', $request->token)->first();
//            dd($result);
            // Update new password
            User::where('email', $result->email)->update(['password'=>bcrypt($request->password)]);

            // Delete token
            ResetPassword::where('token', $request->token)->delete();

            return redirect('login')->with('reset-password-success', 'Reset password successful, please login into system!');
        } else {
            echo "Password doesn't match";
        }
    }

}
