<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'category_id'=>'required|array',
            'image' => 'required|image|mimes:jpeg,png|max:3072',
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:750',
            'price' => 'required|numeric',
            'is_featured' => 'nullable|in:0,1',
            'status' => 'required|in:1,0',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required'=>'Kategori alanı zorunludur.Mevcut bir kategori yoksa önce kategori oluşturunuz.',
            'image.required' => 'Resim alanı zorunludur.',
            'image.image' => 'Resim alanı bir resim dosyası olmalıdır.',
            'image.mimes' => 'Resim dosyası sadece jpeg veya png formatında olmalıdır.',
            'image.max' => 'Resim dosyasının boyutu 3MB\'ı geçemez.',
            'name.required' => 'İsim alanı zorunludur.',
            'name.string' => 'İsim alanı bir metin olmalıdır.',
            'name.max' => 'İsim en fazla 100 karakter olabilir.',
            'description.required' => 'Açıklama alanı zorunludur.',
            'description.string' => 'Açıklama alanı bir metin olmalıdır.',
            'description.max' => 'Açıklama en fazla 750 karakter olabilir.',
            'price.required' => 'Fiyat alanı zorunludur.',
            'price.numeric' => 'Fiyat alanı bir sayı olmalıdır.',
            'is_featured.in' => 'Geçersiz değer.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.in' => 'Durum alanı sadece aktif veya pasif olabilir.',
        ];
    }
}
