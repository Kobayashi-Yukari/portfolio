<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginCheck
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
		//ログインユーザーflag取得
		$permission_flag = Auth::user()->permission_flag;

		//ログイン者でなければリダイレクト
		if ($permission_flag == 0 || $permission_flag == 1 || $permission_flag == 2) {
			return redirect(route('post.index'));
		}
        return $next($request);
    }
}
