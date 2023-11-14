<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'title'=>'nullable|string|max:60',
            'description'=>'nullable|string|max:350',
            'image'=>'required|image|mimes:jpeg,png|max:3072',
            'status'=>'nullable|in:0,1',
        ];
    }

   public function messages() : array
   {
       return [
         'title.string'=>'Başlık alanı metinsel ifade olmalıdır.',
         'title.max'=>'Başlık alanı en fazla 60 karakter olmalıdır.',

         'description.string'=>'Açıklama alanı metinsel ifade olmalıdır.',
         'description.max'=>'Açıklama alanı en fazla 350 karakter olmalıdır.',

         'image.required' =>'Resim alanı zorunludur.',
         'image.image' =>'Yüklediğiniz dosya resim dosyası olmalıdır.',
         'image.mimes' =>'Sadece jpeg veya png uzantılı resimleri yükleyebilirsiniz.',
         'image.max' => 'Yüklenen resim en fazla 3mb olmalıdır.',

         'status.in' => 'Lütfen geçerli bir durum giriniz.',
       ];
   }
}
