<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title_ar' => 'required|string|max:255'
        ];
    }

    protected static function updateRule(): array
    {
        return [
            'id' => 'required|integer|exists:categories,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return (request()->isMethod('POST')) ? CategoryRequest::createRule() : CategoryRequest::updateRule();
    }
}
