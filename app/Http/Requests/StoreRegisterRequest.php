<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
        return [
            'name' => 'required|regex:/^[\pL\s\-\']+$/u',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ];
    }
}
