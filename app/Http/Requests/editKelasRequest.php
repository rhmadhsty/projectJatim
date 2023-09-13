<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class editKelasRequest extends FormRequest
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
        $kelas_id = $this->kelas_id;

        return [
            'kelas_id' => 'required|unique:kelas,kelas_id,' . $kelas_id . ',kelas_id',
            'kelas' => ['required'],
            'jurusan' => ['required'],
        ];
    }
}
