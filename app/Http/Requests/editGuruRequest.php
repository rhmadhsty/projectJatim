<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class editGuruRequest extends FormRequest
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
        $user_id = $this->user_id;

        // dd($this);

        return [
            'user_id' => 'required|unique:user,user_id,' . $user_id . ',user_id',
            'role' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'divisi' => ['required'],
            'nik' => ['required'],
            'tanggal_lahir' => ['required'],
            'no_telp' => ['required'],
        ];
    }

    protected function passedValidation()
    {
        $this->merge(['password'=>Hash::make($this->input('password'))]);
    }
}
