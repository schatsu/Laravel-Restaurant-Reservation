<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png|max:3072',
            'description' => 'required|string|max:400',
            'status' => 'nullable|in:0,1',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Ad alanı zorunludur.',
            'name.string' => 'Ad alanı metin türünde olmalıdır.',
            'name.max' => 'Ad alanı en fazla 100 karakter olmalıdır.',
            'image.required' => 'Resim yüklemesi zorunludur.',
            'image.image' => 'Lütfen bir resim dosyası seçin.',
            'image.mimes' => 'Resim dosyası yalnızca jpeg veya png formatında olmalıdır.',
            'image.max' => 'Resim dosyası en fazla 3mb olmalıdır..',
            'description.required' => 'Açıklama alanı zorunludur.',
            'description.string' => 'Açıklama alanı metin türünde olmalıdır.',
            'description.max' => 'Açıklama alanı en fazla 400 karakter olmalıdır.',
            'status.in' => 'Geçersiz durum değeri. Sadece Aktif veya Pasif olabilir.',
        ];
    }
}
