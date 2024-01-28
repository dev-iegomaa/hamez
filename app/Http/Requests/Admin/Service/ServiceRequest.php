<?php

namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected static function createRule(): array
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'price_en' => 'required|numeric',
            'price_ar' => 'required|numeric',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

    protected static function updateRule(): array
    {
        return [
            'id' => 'required|integer|exists:services,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'price_en' => 'required|numeric',
            'price_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return request()->isMethod('POST') ? ServiceRequest::createRule() : ServiceRequest::updateRule();
    }
}
