<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'slug' => ['nullable', 'string', 'unique:posts,slug,' . $this->post->id],
            'content' => ['required','string'],
            'categories' => ['nullable','array'],
            'categories.*' => ['integer', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'max:2048'],
        ];
    }
    public function attributes(): array
    {
        return [
        'title' => 'required|min:3',
        'slug' => 'required|unique:posts,slug',
        'content' => 'required',
        'categories' => 'required|array',
        'image' => 'nullable|image|max:2048',
        ];
    }
    public function messages()
    {
        return [
        'request.title' => ':title alanı zorunludr.',
        'request.content' => ':content alanı zorunludur.',
        'request.categories' => 'category seçimi zorunludur.',
        ];
    }
    public function getLabel(string $key): string
    {
        return $this->attributes()[$key] ?? $key;
    }

}
