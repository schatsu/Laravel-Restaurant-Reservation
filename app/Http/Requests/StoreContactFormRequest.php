<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactFormRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:100',
            'phone'=>'required|digits:11',
            'message'=>'required|string|max:500',
        ];
    }

    public function messages():array
    {
        return [
            'name.required'=>'Ad alanı zorunludur.',
            'name.string'=>'Ad alanı metinsel olmalıdır.',
            'name.min'=>'Ad alanı en az 3 karakterden oluşmalıdır.',
            'name.max'=>'Ad alanı en fazla 100 karakter olmalıdır.',

            'phone.required'=>'Telefon lanı zorunludur.',
            'phone.digits'=>'Telefon alanı en az 11 basamak olmalıdır.',

            'message.required'=>'Mesaj alanı zorunludur.',
            'message.string'=>'Mesaj alanı metinsel olmalıdır.',
            'message.max'=>'Mesaj alanı en fazla 500 karakter olmalıdır.',
        ];
    }
}
