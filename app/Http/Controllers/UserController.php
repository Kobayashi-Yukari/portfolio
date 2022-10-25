<?php

namespace App\Http\Controllers;

use App\Post;
use App\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	//ログイン者の投稿したもの一覧
	public function index() {
		$posts = Post::where('user_id', Auth::id())->get();
		$letters = Letter::where('user_id', Auth::id())->where('status_flag', 1)->get();
		return view('user.index', compact('posts', 'letters'));
	}

}
