<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        $category = Category::find($this->id ?? 0);

        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'slug' => 'required|string|unique:categories,slug,'.($category->id ?? 0),
            'category_group_id' => 'required|integer|exists:category_groups,id',
        ];
    }
}
