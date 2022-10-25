<?php

namespace App\Http\Controllers;

use App\Post;
use App\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller {
	//member画面一覧
	public function index() {
		if (Auth::user()->flag == 0) {
			$letters = Letter::all();
			$read_letters = Letter::where('read_flag', 1)->where('status_flag', 1)->get();
			$unread_letters = Letter::where('read_flag', 0)->where('status_flag', 1)->get();

			return view('member.index', compact('letters', 'read_letters', 'unread_letters'));
		}
		return redirect()->route('post.index')->with('msg_error', '不正なアクセスです');
	}
}
