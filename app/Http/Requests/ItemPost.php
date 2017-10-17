<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use Illuminate\Contracts\Validation\Validator;

class ItemPost extends FormRequest
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
            'name' => 'required|max:120',
            'thumbnail' => 'mimes:jpeg,bmp,png,gif',
            'image' => 'mimes:jpeg,bmp,png,gif',
            'template'=>'required_without:'.implode(',',array_keys(config('custom.templates'))),
        ];
    }

    /**
     * {@inheritdoc}
     */
    /*
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    */
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请输入产品名称',
            'thumbnail.required'=>'请选择产品缩略图',
            'image.required'=>'请选择产品详图',
            'thumbnail.meimes'=>'图片格式只能为jpeg,bmp,png,gif',
            'image.meimes'=>'图片格式只能为jpeg,bmp,png,gif',
            'template.required_without'=>'请选择模板',
        ];
    }
}
