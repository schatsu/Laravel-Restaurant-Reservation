<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'user_name'=>'required|string|min:3|max:50',
            'comment'=>'required|string|max:500',
            'rating'=>'required|numeric|min:1|max:5',
            'status'=>'nullable|in:1,0',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required'=>'Ad alanı zorunludur.',
            'user_name.string'=>'Ad alanı metinsel olmalıdır.',
            'user_name.min'=>'Ad alanı en az 3 karakter olmalıdır',
            'user_name.max'=>'Ad alanı en fazla 50 karakter olmalıdır',

            'comment.required'=>'Yorum alanı zorunludur.',
            'comment.string'=>'Yorum alanı metinsel olmalıdır.',
            'comment.max' => 'Yorum alanı en fazla 500 karakter olmalıdır.',

            'rating.required'=>'Puan alanı zorunludur.',
            'rating.numeric' => 'Puan alanı numara olmalıdır.',
            'rating.min'=>'Puan alanı en az 1 olmalıdır.',
            'rating.max'=>'Puan alanı en fazla 5 olmalıdır.',

            'status.in'=>'Geçersiz durum.',
        ];
    }
}
