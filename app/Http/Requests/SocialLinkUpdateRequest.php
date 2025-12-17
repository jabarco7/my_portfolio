<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'platform' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
