<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => 'required|string|max:255',
                    'content' => 'required|string',
                    'status' => 'required|in:published,draft,archived',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'sometimes|required|string|max:255',
                    'content' => 'sometimes|required|string',
                    'status' => 'sometimes|required|in:published,draft,archived',
                ];

            default:
                return [];
        }
    }
}
