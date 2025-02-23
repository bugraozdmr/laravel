<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // eğer şuysa bu vs. true olmazsa not authorized döner
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
            'name' => ['required','max:20','min:2'],
            'email' => 'required|max:30|min:2',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'WTF MAN fill this fucking area',
            'name.max' => 'What are you !?'
        ];
    }
}
