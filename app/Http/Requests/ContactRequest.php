<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
    public function rules()
    {
        return [
			'body' => 'required|max:200',
			'title_id' => 'required|in:0,1,2,3',
        ];
    }
	public function messages() {
		return [
			'body.required' => '本文を入力してください。',
			'body.max' => '200文字以内で入力してください。',
			'title_id.required' => '選択してください。',
			'title_id.in' => '不正なアクセスです',
		];
	}
}
