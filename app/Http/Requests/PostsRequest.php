<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => ['required','min:3'],
            'description' => ['required','min:3']   
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '제목을 입력하세요.',
            'title.min' => ':min자 이상 입력하세요.',
            'description.required' => '내용을 입력하세요.',
            'description.min' => ':min자 이상 입력하세요.'
        ];
    }
}
