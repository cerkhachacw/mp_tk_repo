<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'author_id' => 'required|integer|exists:authors,id',
            'publisher_id' => 'required|integer|exists:publishers,id',
            'category_id' => 'required|integer|exists:categories,id',
            'cover' => 'nullable|string',
            'price' => 'required|integer',
            'publish_date' => 'required|date|date_format:Y-m-d',
        ];
    }
}
