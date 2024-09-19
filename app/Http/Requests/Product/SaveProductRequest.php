<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'panjang'       => 'required_without:atb0',
            'lebar'         => 'required_without:atb0',
            'design_img'    => 'required_without_all:no_design,link|array',
            'design_img.*'  => 'required_without_all:no_design,link,design_online|file|min:19|max:20480|mimes:png,jpg,jpeg,pdf,tiff,tif,zip,rar',
            // 'link'          => 'required_without:design_img|url'
        ];
    }

    public function messages()
    {
        return [
            // 'link.url'  => "Format url/link tidak valid. Contoh : <b>https://</b>www.indoprinting<b>.co.id</b>",
            'panjang.required_without'  => "Panjang harus diisi",
            'lebar.required_without'    => "Lebar harus diisi",
            'design_img.*.file'   => "Desain gagal diupload, silahkan cek koneksi pelanggan atau gunakan ukuran yang lebih kecil",
            'design_img.*.min'    => "Ukuran minimal desain 20 KB",
            'design_img.*.max'    => "Ukuran Maksimal desain 20 MB atau kirim desain via link",
            'design_img.*.mimes'  => "Hanya Mendukung Jenis File .jpg, .jpeg, .png, .pdf, .tiff, .zip, dan .rar",
            'design_img.required_without_all' => "Silahkan upload desain atau kirim desain via link",
        ];
    }
}
