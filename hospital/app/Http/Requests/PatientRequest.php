<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class PatientRequest extends Request
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
//            'photo' => 'mimes:jpeg,bmp,png',
            'name' => 'required|max:255',
 //           'birthday'=>'before:date 01/01/2015',
            'address'=>'required|max:255',
            'phone' => 'required|min:7',
            'email' => 'required|email|max:255',
            'cinfidant'=>'text',
        ];
    }

    public function messages()
    {
        return [

            ];

    }
}
