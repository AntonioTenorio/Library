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
            'name' => 'required',
            'address' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo username es requerido',
            'address.required'  => 'El campo dirección es requerido',
            'full_name.required'  => 'El campo nombre es requerido',
            'phone.required'  => 'El campo teléfono es requerido',
            'email.required'  => 'El campo email es requerido',
            'email.email'  => 'El campo email no tiene un formato correcto',
        ];
    }
}
