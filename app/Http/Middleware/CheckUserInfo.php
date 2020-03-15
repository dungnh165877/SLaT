<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;

class CheckUserInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $username = session('user')->username;
        $user = User::where('username', $username)->first();
        if (!$user->fullname || !$user->sex || !$user->birthday || !$user->class || !$user->major_id) {
            return redirect('info')->with('info-error', 'Please complete all information!');
        }
        return $next($request);
    }
}
