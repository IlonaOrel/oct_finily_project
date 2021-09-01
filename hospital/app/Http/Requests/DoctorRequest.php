<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class DoctorRequest extends Request
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
            'photo' => 'mimes:jpeg,bmp,png',
            'name' => 'required|max:255',
            'phone' => 'required|min:7',
            'email' => 'required|email|max:255|unique:doctors',
            'specialization_id' => 'integer',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Name" обязательное к заполнению и не должано привышать 255 символов',
            'phone.required' => 'Поле "Phone" обязательное к заполнению и не менне 7 символов',
            'email.required' => 'Поле "Email" обязательное к заполнению',
            'password.required' => 'Пароль должен иметь не менее 6 символов',
            'password.required' => 'Поле "Password" обязательное к заполнению',
            'password.required' => 'Пароли не совпадает',
        ];

    }
}
