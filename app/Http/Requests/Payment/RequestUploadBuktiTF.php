<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class RequestUploadBuktiTF extends FormRequest
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
            'bukti_tf'  => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'bukti_tf.required' => 'Upload gagal, tidak ada file yang diupload',
            'bukti_tf.image'    => 'Hanya mendukung gambar',
        ];
    }
}
