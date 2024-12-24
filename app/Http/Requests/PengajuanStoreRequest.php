<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $krsExists = $this->user()->krs()->exists();

        return $krsExists ? [
            'topik' => 'required|string|max:255',
            'smt' => 'required|integer|min:1',
        ] : [
            'dosen_id' => 'required|exists:users,id',
            'dosen_pa_id' => 'required|exists:users,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'topik.required' => 'Topik harus diisi',
            'topik.string' => 'Topik harus berupa string',
            'topik.max' => 'Topik tidak boleh lebih dari :max karakter',
            'smt.required' => 'Semester harus diisi',
            'smt.integer' => 'Semester harus berupa angka',
            'smt.min' => 'Semester minimal :min',
            'dosen_id.required' => 'Dosen harus diisi',
            'dosen_id.exists' => 'Dosen tidak ditemukan',
            'dosen_pa_id.required' => 'Dosen PA harus diisi',
            'dosen_pa_id.exists' => 'Dosen PA tidak ditemukan',
        ];
    }
}
