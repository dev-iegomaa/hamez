<?php

namespace App\Http\Requests\Admin\ServicesTerms;

use Illuminate\Foundation\Http\FormRequest;

class ServicesTermsRequest extends FormRequest
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
            'service_en' => 'required|string',
            'service_ar' => 'required|string',
        ];
    }

    protected static function updateRule(): array
    {
        return [
            'id' => 'required|integer|exists:service_terms,id',
            'service_en' => 'required|string',
            'service_ar' => 'required|string',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return (request()->isMethod('POST')) ? ServicesTermsRequest::createRule() : ServicesTermsRequest::updateRule();

    }
}
