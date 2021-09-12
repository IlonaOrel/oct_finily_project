<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CardRequest extends Request
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
            'patient_id' => 'integer',
            'doctor_id' => 'integer',
            'examination_id' => 'integer',
            'conclusion' => 'text',
            'treatment' => 'required|min:255',
            'status_id' => 'integer',
            'date' => 'date',
        ];
    }
}
