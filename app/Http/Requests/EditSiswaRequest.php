<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // dd($this);
        $siswa_id = $this->siswa_id;
        return [
            'siswa_id' => 'required|unique:siswa,siswa_id,' . $siswa_id . ',siswa_id',
            'kelas_id' => ['required'],
            'nis' => ['required'],
            'nama' => ['required'],
            'telepon' => ['required'],
            'tanggal_lahir' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ];
    }
}
