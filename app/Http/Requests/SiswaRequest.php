<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SiswaRequest extends FormRequest
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
        return [
            'nama' => ['required'],
            'telepon' => ['required'],
            'tanggal_lahir' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            // 'is_active' => ['required'],
            'nis' => ['required', 'unique:siswa'],
            'kelas_id' => ['required', 'numeric'],
        ];
    }

    protected function passedValidation()
    {
        $this->merge(['password' => Hash::make($this->input('password'))]);
    }
}
