<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Base
{
   public $model = Author::class;

    public $storeValidator = StoreAuthorRequest::class;
    public $updateValidator = StoreAuthorRequest::class;

    public $resource = AuthorResource::class;

    public $searchAble = ['name', 'email', 'phone', 'address'];
}
