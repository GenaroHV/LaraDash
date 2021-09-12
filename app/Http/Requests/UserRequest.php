<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            // 'email' => ['required', Rule::unique('users')->ignore($this->route('usuarios'))],
            'email' => 'required|email:rfc,dns|unique:users',
            'profile_photo_path' => 'mimes:png,jpg',
            'password' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombres',
            'email' => 'correo',
            'password' => 'contraseña',
            'profile_photo_path' => 'fotografía'
        ];
    }
}
