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
            'category.required' => 'Kategori blog wajib diisi',
            'category.max' => 'Kategori blog maksimal 50 karakter',
            'image.image' => 'File harus berupa gambar',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif'
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->hasFile('image')) {
            $this->merge([
                'image' => $this->file('image')->store('blog-images', 'public')
            ]);
        }
    }
}
