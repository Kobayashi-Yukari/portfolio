<?php

namespace App\Http\Controllers;

use App\Post;
use App\Letter;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
	//投稿一覧
	public function index() {
		$posts = Post::latest()->get();
		return view('post.index', compact('posts'));
	}
	//投稿追加
	public function create() {
		return view('post.create');
	}
	//投稿保存
	public function store(PostRequest $request) {
		Post::create([
				'body' => $request->body,
				'user_id' => Auth::id(),
		]);
		return redirect()->route('post.index')->with('msg_success', '投稿しました');
	}
	public function edit($id) {
		$post = Post::where('id', $id)->where('user_id', Auth::id())->first();
		if (!$post) {
			return redirect()->route('post.index')->with('msg_error', '編集できる投稿がありません');
		}
		return view('post.edit', compact('post'));
	}
	//編集したもののupdate処理
	public function update(PostRequest $request) {
		//投稿がある確認
		$post = Post::where('id', $request->post_id)->where('user_id', Auth::id())->get();
		if (!$post) {
			return redirect()->route('user.index')->with('msg_error', '編集できる投稿がありません');
		}
		//updateカラム更新
		Post::where('id', $request->post_id)->update([
				'body' => $request->body,
				'user_id' => Auth::id(),
		]);
		return redirect()->route('user.index')->with('msg_success', '投稿を編集しました');
	}
	//投稿削除
	public function destroy($id) {
		$post = Post::where('id', $id)->where('user_id', Auth::id())->first();
		if ($post == null) {
			return redirect()->route('user.index')->with('msg_error', '削除できる投稿がありません');
		}
		$post->delete();
		return redirect()->route('user.index')->with('msg_success', '投稿を削除しました');
	}
}
