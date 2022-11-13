<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Base
{
    public $model = Category::class;

    public $storeValidator = StoreCategoryRequest::class;
    public $updateValidator = UpdateCategoryRequest::class;
}
