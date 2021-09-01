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
            'phone' => 'required|min:7',
            'email' => 'required|email|max:255|unique:doctorsDoctorRequest.php',
            'specialization_id' => 'integer',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [

            ];

    }
}
