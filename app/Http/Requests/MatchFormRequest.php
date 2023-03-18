<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'inputaddMoreInputFields.*.nama_klub1' => 'required',
            'inputaddMoreInputFields.*.nama_klub2' => 'required',
            'inputaddMoreInputFields.*.score1' => 'required|numeric',
            'inputaddMoreInputFields.*.score2' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'inputaddMoreInputFields.*.nama_klub1.required' => 'Kolom Nama Klub 1 wajib diisi',
            'inputaddMoreInputFields.*.nama_klub2.required' => 'Kolom Nama Klub 2 wajib diisi',
            'inputaddMoreInputFields.*.score1.required' => 'Kolom Skor 1 wajib diisi',
            'inputaddMoreInputFields.*.score1.numeric' => 'Kolom Skor 1 harus berisi angka',
            'inputaddMoreInputFields.*.score2.required' => 'Kolom Skor 2 wajib diisi',
            'inputaddMoreInputFields.*.score2.numeric' => 'Kolom Skor 2 harus berisi angka',
        ];
    }
}
