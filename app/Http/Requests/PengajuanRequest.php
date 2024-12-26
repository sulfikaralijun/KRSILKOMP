<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PengajuanRequest extends FormRequest
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
        if (Auth::user()->hasRole('mahasiswa')) {
            return [
                'topik' => ['required', 'string', 'max:255'],
                'smt' => ['required', 'integer', 'between:1,14'],
            ];
        }

        if (Auth::user()->hasRole('dosen')) {
            return [
                'status' => ['required', 'in:0,1'],
                'keterangan' => ['nullable', 'string', 'max:255'],
            ];
        }
    }
}
