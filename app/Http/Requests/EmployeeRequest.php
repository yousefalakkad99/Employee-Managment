<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
        'full_name'=>'required',
        'phone_number'=>'required|numeric',
        'dept_code_id'=>'required',
        'grade'=>'required',
        'appointment'=>'required',
        'Identification_Number'=>'required|numeric|unique:employees,Identification_Number,'.$this->id,
        'promotion'=>'required',
        'Academic_qualification'=>'required',
        'courses',
        'empno'=>'required'


        ];
    }

    public function messages()
    {
        return [
        'full_name.required'=>'هذا الحقل مطلوب',
        'dept_code_id.required'=>'هذا الحقل مطلوب',
        'grade.required'=>'هذا الحقل مطلوب',
        'appointment.required'=>'هذا الحقل مطلوب',
        'Identification_Number.required'=>'هذا الحقل مطلوب',
        'Identification_Number.numeric'=>'يرجى ادخال ارقام فقط',
        'promotion.required'=>'هذا الحقل مطلوب',
        'Academic_qualification.required'=>'هذا الحقل مطلوب',
        'Academic_qualification_photo.required'=>'هذا الحقل مطلوب',
        'image.required'=>'هذا الحقل مطلوب',
        'image.image'=>'يجب ان يكون الملف صورة',
        'Identification_Number.unique'=>'رقم الهوية لا يمكن ان يتكرر',
        'phone_number.required'=>'هذا الحقل مطلوب',
        'phone_number.numeric'=>'يرجى ادخال ارقام فقط',
        'empno.required'=>'هذا الحقل مطلوب',






        ];


    }
}
