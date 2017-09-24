<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Page extends FormRequest
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
            'title' => 'required|max:120',
            'alias' => 'regex:/^[a-z0-9A-Z\/]*$/'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '请输入标题',
            'alias.regex' => '只能为英文或者数字'
        ];
    }
}
