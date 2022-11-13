<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;

class AuthorController extends Base
{
   public $model = Author::class;

    public $storeValidator = StoreAuthorRequest::class;
    public $updateValidator = UpdateAuthorRequest::class;
}
