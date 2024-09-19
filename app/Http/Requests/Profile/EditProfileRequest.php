<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name'  => 'required',
            'phone' => 'required|numeric|unique:App\Models\User,phone,' . Auth()->id(),
            'email' => 'nullable||email:dns|unique:App\Models\User,email,' . Auth()->id(),
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama harus diisi',
            'phone.required'    => 'Nomor telepon harus diisi',
            'phone.unique'      => 'Nomor telepon sudah terdaftar',
            'phone.numeric'     => 'Nomor telepon hanya berupa angka',
            'email.email'       => 'Format alamat e-mail tidak valid, contoh yang valid : emailku@indoprinting.co.id',
            'email.unique'      => 'Alamat e-mail sudah terdaftar',
        ];
    }
}
