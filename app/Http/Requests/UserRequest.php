<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        'username'=>'regex:/^\S*$/u|required|unique:users,username,'.$this->id,
        'password'=>'required|min:8',
        'image'=>'required|image',
        'email'=>'required|email|max:255|unique:users,email,'.$this->id,
        'roles_name'=>'required',

        ];
    }

    public function messages()
    {
        return [

        'username.regex'=>'اسم المستخدم يجب الا يحتوي على مسافة',
        'password.required'=>'هذا الحقل مطلوب',
        'password.min'=>'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',
        'roles_name.required'=>'هذا الحقل مطلوب',
        'email.email'=>'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا',
        //'email.regex'=>'تنسيق البريد الإلكتروني غير صالح',
        'email.required'=>'هذا الحقل مطلوب',
        'username.required'=>'هذا الحقل مطلوب',
        'image.required'=>'هذا الحقل مطلوب',
        'image.image'=>'يرجى ادراج صورة',
        'username.unique'=>'هذاالاسم مستخدم',
        'email.unique'=>'البريد الاكتروني مستخدم',



        ];


    }
}
