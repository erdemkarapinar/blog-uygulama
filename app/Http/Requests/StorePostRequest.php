<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'slug' => ['nullable','string','unique:posts,slug'],
            'content' => ['required','string'],
            'categories' => ['nullable','array'],
            'categories.*' => ['exists:categories,id'],
            'image' => ['nullable','image','max:2048'],
        ];
    }
}
