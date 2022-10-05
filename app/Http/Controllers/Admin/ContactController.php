<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReplyRequest;
use App\Contact;


class ContactController extends Controller {
	//返信
	public function reply(ReplyRequest $request) {
		$contact = Contact::where('id', $request->contact_id)->where('reply', NULL)->first();
		if (!$contact) {
			return redirect()->route('contact.index')->with('msg_error', '不正なアクセスです');
		}
		$contact->update([
			'reply' => $request->reply,
		]);
		return redirect()->route('contact.index')->with('msg_success', '返信しました');
	}
}
