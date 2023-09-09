<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreRequest extends FormRequest
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
    // protected FormRequest $formRequest;
    public function rules(): array
    {
        // dd($this);
        return [
            'name' => ['required'],
            'role' => ['required', 'unique:user'],
            'email' => ['required', 'email', 'unique:user'],
            'password' => ['required', 'confirmed'],
            'divisi' => ['required'],
            'nik' => ['required', 'unique:user'],
            'tanggal_lahir' => ['required', 'date'],
            'no_telp' => ['required'],
        ];
    }
    protected function passedValidation()
    {
        $this->merge(['password'=>Hash::make($this->input('password'))]);
    }
}
