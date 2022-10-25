<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules() {
		return [
			'body' => 'required|max:1000',
			'member_id' =>' required|in:0,1,2,3,4,5',
			'from_name' =>' max:100',
			'letter_avatar' =>' required|in:1,2'
		];
	}

	public function messages() {
		return [
			'body.required' => '本文を入力してください。',
			'member_id.required' => 'メンバーを選択してください。',
			'letter_avatar.required' => 'アイコンを選択してください。',
			'member_id.in' => '不正なアクセスです。',
			'letter_avatar.in' => '不正なアクセスです。',
			'body.max' => '1000文字以内で入力してください。',
			'from_name.max' => '100文字以内で入力してください。',
		];
	}
}
