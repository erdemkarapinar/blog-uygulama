<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required','email'],
            'password' => ['required','string','min:6'],
        ];
    }
    public function attributes(): array
    {
        return [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
        ];
    }
    public function messages()
    {
        return [
        'request.email' => ':email alanı zorunludur.',
        'request.password' => ':password alanı zorunludur ve en az 6 karakter uzunluğunda olmalıdır.',
        ];
    }
    public function getLabel(string $key): string
    {
        return $this->attributes()[$key] ?? $key;
    }
}
