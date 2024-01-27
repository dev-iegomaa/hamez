<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'image' => 'required|file|mimes:png,jpg,webp,jpeg'
        ];
    }

    protected static function updateRule(): array
    {
        return [
            'id' => 'required|integer|exists:sliders,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:png,jpg,webp,jpeg'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return (request()->isMethod('POST')) ? SliderRequest::createRule() : SliderRequest::updateRule();
    }
}
