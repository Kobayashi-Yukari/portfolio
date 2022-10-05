<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Letter;
use App\User;
use App\Post;

class AdminController extends Controller {
	//管理画面一覧
	public function index() {
	$users = User::all();
	$posts = Post::orderBy('id', 'desc')->get();
	$letters = Letter::where('status_flag', 1)->orderBy('id', 'desc')->get();
	return view('admin.index', compact('posts', 'letters', 'users'));

	}
}
