<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditAddressRequest extends FormRequest
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
            'rt_rw'       => 'required_with:address',
            'province'    => 'required_with:address',
            'city'        => 'required_with:address',
            'suburb'      => 'required_with:address',
            'postcode'    => 'required_with:address',
        ];
    }

    public function messages()
    {
        return [
            'rt_rw.required_with'         => 'Harap masukkan RT/RW alamat pelanggan',
            'province.required_with'      => 'Harap masukkan nama provinsi alamat pelanggan',
            'city.required_with'          => 'Harap masukkan nama kota/kabupaten alamat pelanggan',
            'suburb.required_with'        => 'Harap masukkan nama kecamatan alamat pelanggan',
            'postcode.required_with'      => 'Harap masukkan kode pos alamat anda',
        ];
    }
}
