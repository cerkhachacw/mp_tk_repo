<?php

namespace App\Http\Requests;

use App\Models\CategoryGroup;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryGroupRequest extends FormRequest
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
        $categoryGroup = CategoryGroup::find($this->id ?? 0);
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'slug' => 'required|string|unique:category_groups,slug,'.($categoryGroup->id ?? 0),
        ];
    }
}
