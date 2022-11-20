<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'department_code'=>'required|max:100|unique:department,department_code,',
            'department_name'=>'required|max:100|unique:department,department_name,',
        ];
    }

    public function messages()
    {
        return [
        'department_code.required'=>'هذا الحقل مطلوب',
        'department_code.max'=>'نص الحقل كبير',
        'department_code.unique'=>'رقم الفسم موجود فعلا',

        'department_name.required'=>'هذا الحقل مطلوب',
        'department_name.max'=>'نص الحقل كبير',
        'department_name.unique'=>'اسم الفسم موجود فعلا',


        ];


    }
}
