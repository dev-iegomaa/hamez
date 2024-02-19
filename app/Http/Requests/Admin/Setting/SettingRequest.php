<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:png,jpg,webp,jpeg',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'location_en' => 'required|string|max:255',
            'location_ar' => 'required|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'whatsapp' => 'required|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'snapchat' => 'nullable|url|max:255',
            'opening_from' => 'required|string|max:255|in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
            'opening_to' => 'required|string|max:255|in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
            'time_from' => 'required|string',
            'time_to' => 'required|string',
        ];
    }
}
