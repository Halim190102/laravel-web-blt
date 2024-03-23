<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtid' => 'required|unique:bantuans,id|min:7|max:20',
            'txtnama' => 'required',
            'txtgender' => 'required',
            'txtalamat' => 'required',
            'txtnohp' => 'required',
            'pekerjaan' => 'required'
            
        ];
    }

    public function messages(): array
    {
        return [
            'txtid.required' => ':attribute Tidak boleh Kosong',
            'txtid.unique' => ':attribute Sudah Ada dalam Tabel',
            'txtnama.required' => ':attribute Tidak Boleh Kosong'
        ];
    }
    public function attributes(): array
    {
        return [
            'txtid' => 'ID Bantuns',
            'txtnama' => 'Nama Lengkap',
        ];
    }
}
