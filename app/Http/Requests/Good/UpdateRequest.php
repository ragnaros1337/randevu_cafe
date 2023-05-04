<?php

namespace App\Http\Requests\Good;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:App\Models\Good,title|string',
            'article' => 'required|unique:App\Models\Good,article|string',
            'preview_image' => 'required',
            'price' => 'required|numeric',
            'count' => 'required|integer',
            'is_published' => 'nullable',
            'category_id' => 'nullable'
        ];
    }
}
