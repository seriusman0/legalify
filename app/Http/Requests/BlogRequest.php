<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string', 'max:50'],
            'image' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul blog wajib diisi',
            'title.max' => 'Judul blog maksimal 255 karakter',
            'content.required' => 'Konten blog wajib diisi',
            'content.string' => 'Konten blog harus berupa teks',
            'category.required' => 'Kategori blog wajib diisi',
            'category.max' => 'Kategori blog maksimal 50 karakter',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif'
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        
        $validator->after(function ($validator) {
            // Check if content is empty after stripping HTML tags
            if ($this->has('content') && empty(trim(strip_tags($this->input('content'))))) {
                $validator->errors()->add('content', 'Konten blog wajib diisi');
            }
        });
        
        return $validator;
    }
}
