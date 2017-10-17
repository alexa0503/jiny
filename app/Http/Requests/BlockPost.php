<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlockPost extends FormRequest
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
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => ' 请输入标题',
            'thumbnail.required'=>'请选择产品缩略图',
            'image.required'=>'请选择产品详图',
            'thumbnail.meimes'=>'图片格式只能为jpeg,bmp,png,gif',
            'image.meimes'=>'图片格式只能为jpeg,bmp,png,gif',
            'template.required_without'=>'请选择模板',
        ];
    }
}
