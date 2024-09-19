<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
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
            'password'  => 'required|confirmed|min:4'
        ];
    }

    public function messages()
    {
        return [
            'password.required'     => 'Password tidak boleh kosong',
            'password.confirmed'    => 'Konfirmasi password tidak sama',
            'password.min'          => 'Password minimal 4 karakter',
        ];
    }
}
