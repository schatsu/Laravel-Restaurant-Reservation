<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'person' => 'required|numeric',
            'date' => 'required|date|after:yesterday',
            'time' => 'required',
            'message' => 'nullable|string',
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'Ad alanı zorunludur.',
            'name.string' => 'Ad alanı metin olmalıdır.',
            'name.max' => 'Ad alanı en fazla 255 karakter olmalıdır.',

            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',

            'phone.required' => 'Telefon alanı zorunludur.',
            'phone.string' => 'Telefon alanı metin olmalıdır.',
            'phone.max' => 'Telefon alanı en fazla 20 karakter olmalıdır.',

            'person.required' => 'Kişi sayısı alanı zorunludur.',
            'person.numeric' => 'Kişi sayısı alanı sayı olmalıdır.',

            'date.required' => 'Tarih alanı zorunludur.',
            'date.date' => 'Tarih alanı geçerli bir tarih olmalıdır.',

            'time.required' => 'Zaman alanı zorunludur.',
            'time.date_format' => 'Zaman alanı HH:ii formatında olmalıdır.',

            'message.string' => 'Mesaj alanı metinsel ifade olmalıdır..',

        ];
    }
}
