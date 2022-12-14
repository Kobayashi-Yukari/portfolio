<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

	 * @return array
	 */
	public function rules() {
		return [
			'body' => 'required|max:200',
		];
	}

	public function messages() {
		return [
			'body.required' => '本文を入力してください。',
			'body.max' => '200文字以内で入力してください。',
		];
	}
}
