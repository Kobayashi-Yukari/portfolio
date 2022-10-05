<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Letter;
use App\User;
use App\Post;

class PostController extends Controller {
	
public function edit($id) {
		$post = Post::find($id);
		if (!$post) {
			return redirect()->route('admin.index')->with('msg_error', '編集できる投稿がありません');
		}
		return view('admin.post.edit', compact('post'));
	}
	//編集したもののupdate処理
	public function update(PostRequest $request) {
		//投稿がある確認
		$post = Post::find($request->post_id);
		if (!$post) {
			return redirect()->route('admin.index')->with('msg_error', '編集できる投稿がありません');
		}
		//updateカラム更新
		Post::where('id', $request->post_id)->update([
				'body' => $request->body,
		]);
		return redirect()->route('admin.index')->with('msg_success', '投稿を編集しました');
	}
	//投稿削除
	public function destroy($id) {
		$post = Post::find($id);
		if ($post == null) {
			return redirect()->route('admin.index')->with('msg_error', '削除できる投稿がありません');
		}
		$post->delete();
		return redirect()->route('admin.index')->with('msg_success', '投稿を削除しました');
	}
}
