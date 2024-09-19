<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginPhoneRequest extends FormRequest
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
            'phone'     => 'required|numeric',
            'password'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'    => "Nomor telepon harus diisi",
            'phone.numeric'    => "Harap masukkan nomor telepon yang valid",
            'password.required'    => "Password harus diisi"
        ];
    }
}
