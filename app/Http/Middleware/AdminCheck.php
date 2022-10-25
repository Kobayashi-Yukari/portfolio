<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
		if (!Auth::user()) {
			return response(view('welcome'));
		}	
		//ログインユーザーflag取得
		$permission_flag = Auth::user()->permission_flag;

		//ログイン者が管理人のflag = 2でなければリダイレクト
		if ($permission_flag != 2) {
			return redirect(route('post.index'));
		}
		//チェックに合格し次の処理に進むことができる
		return $next($request);
	}
}
