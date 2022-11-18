<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Base
{
    public $model = Book::class;

    public $storeValidator = StoreBookRequest::class;
    public $updateValidator = StoreBookRequest::class;

    public $resource = BookResource::class;

    public $searchAble = ['title', 'description', 'author.name', 'category.name', 'publisher.name'];

    public function __prepareQueryList($query)
    {
        if ($this->requestData->has('author_id')) {
            $query->where('author_id', $this->requestData->input('author_id'));
        }

        if ($this->requestData->has('category_id')) {
            $query->where('category_id', $this->requestData->input('category_id'));
        }

        if ($this->requestData->has('publisher_id')) {
            $query->where('publisher_id', $this->requestData->input('publisher_id'));
        }
    }
}
