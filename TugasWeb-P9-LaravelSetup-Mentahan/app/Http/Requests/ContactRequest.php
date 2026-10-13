<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** Validasi formulir kontak (aturan sama dengan validasi JS di landing page asli). */
class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'    => ['required', 'string', 'min:3', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'tanggal' => ['nullable', 'date'],
            'pesan'   => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'  => 'Nama wajib diisi.',
            'nama.min'       => 'Nama minimal :min karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'tanggal.date'   => 'Tanggal tidak valid.',
            'pesan.required' => 'Pesan wajib diisi.',
            'pesan.min'      => 'Pesan minimal :min karakter.',
            'pesan.max'      => 'Pesan maksimal :max karakter.',
        ];
    }
}
