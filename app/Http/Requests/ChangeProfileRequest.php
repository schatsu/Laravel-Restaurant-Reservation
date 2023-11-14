<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeProfileRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'email'=>'required|email:filter',
            'avatar'=>'sometimes|image|mimes:jpeg,png|max:1024',
        ];
    }

    public function messages():array
    {
        return [
            'name.required'=>'Ad alanı zorunludur.',
            'name.string'=>'Ad alanı metinsel olmalıdır.',
            'name.max'=>'Ad alanı en fazla 50 karakter olmalıdır.',

            'email.required'=>'E-Posta alanı zorunludur.',
            'email.email'=>'Lütfen doğru bir e-posta formatı giriniz.',

            'avatar.image'=>'Profil fotoğrafı resim dosyası olmalıdır.',
            'avatar.mimes'=>'Profil fotoğrafı jpeg veya png olmalıdır.',
            'avatar.max'=>'Profil fotoğrafı en fazla 1mb olmalıdır.',
        ];
    }
}
