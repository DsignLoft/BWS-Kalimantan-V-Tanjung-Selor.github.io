<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class TanpaRegisterRequest extends FormRequest
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
            'name'      => 'required',
            'phone'     => 'required',
            'rt-rw'     => 'required_with:address',
            'province'  => 'required_with:address',
            'city'      => 'required_with:address',
            'suburb'    => 'required_with:address',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama harus diisi",
            'phone.required' => "Nomor telepon harus diisi",
            'rt-rw.required_with'       => "RT/RW Harus diisi",
            'province.required_with'    => "Silahkan pilih provinsi",
            'city.required_with'        => "Silahkan pilih kota/kabupaten",
            'suburb.required_with'      => "Silahkan pilih kecamatan",
        ];
    }
}
