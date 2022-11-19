<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'username'=>'regex:/^\S*$/u|required|unique:users,username,'.$this->user_id,
            'email'=>'required|email|max:255|unique:users,email,'.$this->user_id,
            'roles_name'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'هذا الحقل مطلوب',
            'username.unique'=>'هذاالاسم مستخدم',
            'username.regex'=>'اسم المستخدم يجب الا يحتوي على مسافة',
            'email.required'=>'هذا الحقل مطلوب',
            'email.email'=>'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا',
            'email.regex'=>'تنسيق البريد الإلكتروني غير صالح',
            'roles_name.required'=>'هذا الحقل مطلوب',


        ];


    }
}
