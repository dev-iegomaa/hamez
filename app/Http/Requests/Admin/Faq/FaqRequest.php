<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question_en' => 'required|string',
            'question_ar' => 'required|string',
            'answer_en' => 'required|string',
            'answer_ar' => 'required|string',
        ];
    }

    protected static function updateRule(): array
    {
        return [
            'id' => 'required|integer|exists:faqs,id',
            'question_en' => 'required|string',
            'question_ar' => 'required|string',
            'answer_en' => 'required|string',
            'answer_ar' => 'required|string',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return (request()->isMethod('POST')) ? FaqRequest::createRule() : FaqRequest::updateRule();
    }
}
