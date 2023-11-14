<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'logo' => 'nullable|image|mimes:jpeg,png|max:1024',
            'site_name' => 'nullable|string',
            'email' => 'nullable|string|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'google_maps' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'footer_text' => 'nullable|string',
            'instagram' => 'nullable|string|url',
            'facebook' => 'nullable|string|url',
            'twitter' => 'nullable|string|url',
            'seo_keywords_home' => 'nullable|string',
            'seo_description_home' => 'nullable|string',
            'seo_keywords_about_us' => 'nullable|string',
            'seo_description_about_us' => 'nullable|string',
            'seo_keywords_menu' => 'nullable|string',
            'seo_description_menu' => 'nullable|string',
        ];
    }

    public function messages():array
    {
        return [
            'logo.nullable' => 'Logo alanı boş bırakılabilir veya bir resim dosyası olmalıdır.',
            'logo.image' => 'Logo bir resim dosyası olmalıdır.',
            'logo.mimes' => 'Logo sadece JPEG veya PNG formatında olabilir.',
            'logo.max' => 'Logo dosyası 1024 KB (1 MB) boyutunu aşmamalıdır.',
            'site_name.string' => 'Site adı bir metin olmalıdır.',
            'email.string' => 'E-posta bir metin olmalıdır.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'phone.string' => 'Telefon numarası bir metin olmalıdır.',
            'address.string' => 'Adres bir metin olmalıdır.',
            'google_maps.string' => 'Google Maps bağlantısı bir metin olmalıdır.',
            'working_hours.string' => 'Çalışma saatleri bir metin olmalıdır.',
            'footer_text.string' => 'Footer metni bir metin olmalıdır.',
            'instagram.string' => 'Instagram alanı bir metin olmalıdır.',
            'instagram.url' => 'Instagram alanı geçerli bir URL içermelidir.',
            'facebook.string' => 'Facebook alanı bir metin olmalıdır.',
            'facebook.url' => 'Facebook alanı geçerli bir URL içermelidir.',
            'twitter.string' => 'Twitter alanı bir metin olmalıdır.',
            'twitter.url' => 'Twitter alanı geçerli bir URL içermelidir.',
            'seo_keywords_home.string' => 'Ana sayfa SEO anahtar kelimeleri bir metin olmalıdır.',
            'seo_description_home.string' => 'Ana sayfa SEO açıklaması bir metin olmalıdır.',
            'seo_keywords_about_us.string' => 'Hakkımızda sayfası SEO anahtar kelimeleri bir metin olmalıdır.',
            'seo_description_about_us.string' => 'Hakkımızda sayfası SEO açıklaması bir metin olmalıdır.',
            'seo_keywords_menu.string' => 'Menü SEO anahtar kelimeleri bir metin olmalıdır.',
            'seo_description_menu.string' => 'Menü SEO açıklaması bir metin olmalıdır.',
        ];
    }

}
