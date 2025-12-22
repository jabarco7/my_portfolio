<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
    // Define regex patterns as variables to avoid parsing issues
    $nameRegex = "/^[a-zA-Z\s\-\.']+$/";
    $contentRegex = '/<script|javascript:|onload=|onerror=/i';

    return [
        'name' => ['required', 'string', 'max:255', "regex:$nameRegex"],
        'email' => 'required|email|max:255',
        'subject' => ['required', 'string', 'max:255', "not_regex:$contentRegex"],
        'message' => ['required', 'string', 'max:2000', "not_regex:$contentRegex"],
    ];
}

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your name.',
            'name.regex' => 'Name can only contain letters, spaces, hyphens, periods, and apostrophes.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'subject.required' => 'Please specify a subject.',
            'subject.not_regex' => 'Subject contains invalid content. Please remove any scripts or HTML-like content.',
            'message.required' => 'Please provide a message.',
            'message.max' => 'Message must not exceed 2000 characters.',
            'message.not_regex' => 'Message contains invalid content. Please remove any scripts or HTML-like content.',
        ];
    }
}