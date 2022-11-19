<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'full_name'=>'required',
            'grade'=>'required',
            'appointment'=>'required',
            'Identification_Number'=>'required|numeric|unique:employees,Identification_Number,'.$this->employee_id,
            'empno'=>'required',
            'promotion'=>'required',
            'Academic_qualification'=>'required',
            'image'=>'image',
            'phone_number'=>'required|numeric',

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
        'phone_number.required'=>'هذا الحقل مطلوب',
        'phone_number.numeric'=>'يرجى ادخال ارقام فقط',

        'Academic_qualification.required'=>'هذا الحقل مطلوب',

        'image.required'=>'هذا الحقل مطلوب',
        'image.image'=>'يجب ان يكون الملف صورة',
        'Identification_Number.unique'=>'رقم الهوية لا يمكن ان يتكرر',
        'empno.required'=>'هذا الحقل مطلوب',




        ];


    }
}
