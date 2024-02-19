<?php

namespace App\Http\Requests\EndUser;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'date' => 'required|date',
            'place' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'service_id' => 'required|integer|exists:services,id',
            'available_time' => 'required|string',
            'full_name' => 'required|string',
            'phone_number' => 'required|string',
            'subject' => 'nullable|string',
            'email' => 'nullable|email',
            'birth_date' => 'required|date',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
