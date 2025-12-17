<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:projects,slug,' . $this->route('project')],
            'excerpt' => ['nullable', 'string'],
            'description' => ['required', 'string'],
            'client' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'featured_image' => ['nullable', 'image', 'max:2048'], // 2MB Max
            'is_featured' => ['boolean'],
            'is_active' => ['boolean'],
            'order' => ['nullable', 'integer'],
            'category_id' => ['nullable', 'exists:project_categories,id'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:project_tags,id'],
            'images.*' => ['nullable', 'image', 'max:2048'],
        ];

        return $rules;
    }
}
