<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\CategoryGroup;
use App\Models\Publisher;
use Faker\Factory;
use Illuminate\Http\Request;

class BookController extends Base
{
    public $model = Book::class;

    public $storeValidator = StoreBookRequest::class;
    public $updateValidator = UpdateBookRequest::class;

    public $resource = BookResource::class;

}
