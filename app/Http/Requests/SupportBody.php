<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportBody extends FormRequest
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
             'sort_id'=>'required|numeric',
             'txt'=>'required',
             'image'=>'required',
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
             'title.required' => '请输入标题',
             'sort_id.required'=>'请输入排序',
             'sort_id.numeric'=>'排序只能为数字',
             'txt.required'=>'请输入内容',
             'image.required'=>'请上传图片',
         ];
     }
}
