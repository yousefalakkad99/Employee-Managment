<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacationsRequest extends FormRequest
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
            'vacations'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'vacations.required'=>'يرجى تحديد تاريخ',


        ];
    }

}
