<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
			'reply' => 'required|max:200',
			'contact_id' => 'required',
        ];
    }
	public function messages() {
		return [
			'reply.required' => '返信は入力してください。',
			'reply.max' => '200文字以内で入力してください。',
			'contact_id.required' => '選択してください。',
		];
	}
}
