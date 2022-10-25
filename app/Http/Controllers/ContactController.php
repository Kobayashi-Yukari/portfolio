<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller {
	public function index() {
		$contacts = $this->contactShow();
		$titles = config('title');
			return view('contact.index', compact('contacts', 'titles'));
	}
	//問い合わせ保存
	public function store(ContactRequest $request) {
		Contact::create([
				'body' => $request->body,
				'user_id' => Auth::id(),
				'title_id' => $request->title_id,
		]);
		return redirect()->route('contact.index')->with('msg_success', 'お問合せ完了です');
	}
	private function contactShow() {
		if (Auth::user()->permission_flag !== 2) {
			return Contact::where('user_id', Auth::id())->get();
		} 
		return Contact::all();
	}
}
