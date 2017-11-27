<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Solution extends FormRequest
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
             //'attachment' => 'required',
             'image' => 'required',
             'sort_id'=>'required|numeric',
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
             'name.required' => '请输入名称',
             //'attachment.required'=>'请上传附件',
             'image.required'=>'请上传详图',
             'sort_id.required'=>'请输入排序',
             'sort_id.numeric'=>'排序只能为数字',
         ];
     }
}
