<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'alamat_outlet' => 'required_if:pickup_method,Self-pickup',
            'pickup_method' => 'required_without:tanpa_login',
            'ongkos_kirim'  => 'required_if:pickup_method,Delivery',
            'name'      => 'required_with:tanpa_login',
            'phone'     => 'required_with:tanpa_login',
        ];
    }

    public function messages()
    {
        return [
            'name.required_with'    => 'Harap isi nama lengkap pelanggan',
            'phone.required_with'   => 'Harap isi no. telp pelanggan',
            'pickup_method.required_without'    => 'Silahkan pilih pengiriman',
            'alamat_outlet.required_if' => 'Silahkan pilih alamat pickup',
            'ongkos_kirim.required_if'  => 'Pilih kurir untuk pengiriman <b>Delivery</b>',
        ];
    }
}
