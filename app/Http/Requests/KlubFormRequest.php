<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KlubFormRequest extends FormRequest
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
            "nama_klub" => "required|max:32",
            "kota_klub" => "required|max:32"
        ];
    }

    public function messages(): array
    {
        return [
            "nama_klub.required" => "Nama klub harus diisi.",
            "kota_klub.required" => "Kota klub harus diisi.",
            "nama_klub.max" => "Nama klub minimal 32 karakter.",
            "kota_klub.max" => "Kota klub minimal 32 karakter.",
        ];
    }
}
