<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'max:255', 'string'],
            'description' => ['sometimes', 'required', 'string'],
            'image' => ['sometimes', 'required', 'image'],
            'author_id' => ['sometimes', 'required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'image.image' => 'Yüklenen dosya geçerli bir resim olmalıdır.',
            'author_id.required' => 'Yazar alanı zorunludur.',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if ($this->title === 'test') {
                $validator->errors()->add('title', 'Başlık "test" olamaz.');
            }
        });
    }
}
