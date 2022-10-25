<?php

namespace App\Http\Controllers;

use App\Letter;
use App\Http\Requests\LetterRequest;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LetterController extends Controller {

	public function index() {
		$letters = Letter::all();    
		return view('letter.index', compact('letters'));
	}
	//作成画面
	public function create() {
		$members = config('member');
		return view('letter.create', compact('members'));
	}

	//preview画面へ
	public function preview(LetterRequest $request) {
		//他の人には見れないような処理
		$letter = Letter::updateOrCreate(['id' => $request->id], [
				'user_id' => Auth::id(),
				'body' =>$request->body,
				'member_id' =>$request->member_id,
				'from_name' =>$this->fromName($request),
				'letter_avatar' => $this->letterAvatar($request)
		]);
		return view('letter.preview', compact('letter'));
	}
	//書き直す
	public function edit($id) {
		$members = config('member');
		$letter = Letter::where('id', $id)->where('user_id', Auth::id())->first();
		if (!$letter) {
			return redirect()->route('')->with('msg_error', '編集できるお手紙がありません');
		}
		return view('letter.edit', compact('letter', 'members'));
	}
	//送る	
	public function store($id) {
		$letter = Letter::where('id', $id)->where('user_id', Auth::id())->first();
		if (!$letter) {
			return redirect()->route('post.index')->with('msg_error', '保存できるお手紙がありません');
		}
		// 保存したらstatus_flagは0->1へ変更
		$letter->status_flag = 1;
		$letter->save();
		return redirect()->route('post.index')->with('msg_success', 'お手紙ありがとうございます！');
	}
	//キャンセル
	public function cancel($id) {
		$letter = Letter::where('id', $id)->where('user_id', Auth::id())->first();
		if ($letter == null) {
			return redirect()->route('post.index')->with('msg_error', 'キャンセルできるお手紙がありません');
		}
		$letter->delete();
		return redirect()->route('post.index')->with('msg_success', 'キャンセルしました');
	}
	//メンバーが既読にするとread_flagが0->1変更
	public function flagChange($id) {
		$letter = Letter::where('id', $id)->first();
		if (!$letter) {
			return back()->with('msg_error', '既読にできるお手紙がありません');
		}
		$letter->read_flag = 1;
		$letter->save();
		return back()->with('msg_success', '既読に移動しました');
	}
	private function fromName($req) {
		if ($req->from_name == null) {
		return "匿名希望さん";
		}
		return $req->from_name;
	}
	private function letterAvatar($req) {
		if ($req->letter_avatar == 1) {
		return Auth::user()->avatar;
		}
		return "default.png";
	}
}
