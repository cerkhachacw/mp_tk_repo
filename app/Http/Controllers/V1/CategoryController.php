<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Base
{
    public $model = Category::class;

    public $storeValidator = StoreCategoryRequest::class;
    public $updateValidator = StoreCategoryRequest::class;

    public $resource = CategoryResource::class;

    public $searchAble = ['name', 'description', 'category_group.name'];

    public function __prepareQueryList($query)
    {
        if ($this->requestData->has('category_group_id')) {
            $query->where('category_group_id', $this->requestData->input('category_group_id'));
        }
    }
}
