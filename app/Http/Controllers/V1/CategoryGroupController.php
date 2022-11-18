<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreCategoryGroupRequest;
use App\Http\Resources\CategoryGroupResource;
use App\Models\CategoryGroup;

class CategoryGroupController extends Base
{
    public $model = CategoryGroup::class;

    public $storeValidator = StoreCategoryGroupRequest::class;
    public $updateValidator = StoreCategoryGroupRequest::class;

    public $resource = CategoryGroupResource::class;

    public $searchAble = ['name', 'description'];

}
