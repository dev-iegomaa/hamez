<?php

namespace App\Http\Requests\Admin\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            'id' => 'required|integer|exists:contacts,id',
            'name' => 'required|string|exists:contacts,name',
            'email' => 'required|email|exists:contacts,email',
            'phone' => 'required|string|exists:contacts,phone',
            'subject' => 'required|string|exists:contacts,subject',
            'message' => 'required|string|exists:contacts,message',
            'status' => 'required|string|in:Approved,Pending,Rejected,In Progress'
        ];
    }
}
