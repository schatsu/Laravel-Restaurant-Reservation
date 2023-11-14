<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'title' =>'required|string|min:2',
            'sub_title'=>'nullable|string|min:2',
            'status'=>'required|in:0,1',
        ];
    }

    public function messages():array
    {
        return [
            'image.required' =>'Resim alanı zorunludur.',
            'image.image' =>'Yüklediğiniz dosya resim dosyası olmalıdır.',
            'image.mimes' =>'Sadece jpeg veya png uzantılı resimleri yükleyebilirsiniz.',
            'image.max' => 'Yüklenen resim en fazla 3mb olmalıdır.',

            'title.required'=>'Başlık alanı zorunludur.',
            'title.string'=>'Başlık alanı metinsel ifade olmalıdır.',
            'title.min'=>'Başlık alanı en az 2 karakter olmalıdır.',

            'sub_title.string'=>'Başlık alanı metinsel ifade olmalıdır.',
            'sub_title.min'=>'Başlık alanı en az 2 karakter olmalıdır.',

            'status.in' => 'Lütfen geçerli bir durum giriniz.',
        ];
    }
}
