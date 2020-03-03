<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
            return redirect()->to('login');
        } else {
            return redirect()->to('register');
        }
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $user = User::select('*')
            ->where('username', '=', $request->username)
            ->where('password', '=', bcrypt($request->password))
            ->get();
//        dd($user);
        if ($user) {
            return redirect('/');
        } else {
            return redirect('login')->with('login-error', 'Username or password incorrect!');
        }
    }

    public function forgotPassword(Request $request) {
        //Tạo token và gửi đường link reset vào email nếu email tồn tại
        $email = $request->email;
        $result = User::where('email', $email )->first();
        if($result){
            $resetPassword = ResetPassword::firstOrCreate(['email'=>$email, 'token'=>Str::random(60)]);

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

        if($result){
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

            return redirect()->to('login');
        } else {
            echo "Password doesn't match";
        }
    }

}
