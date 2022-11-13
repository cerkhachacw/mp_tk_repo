<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Base;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;

class PublisherController extends Base
{
    public $model = Publisher::class;

    public $storeValidator = StorePublisherRequest::class;
    public $updateValidator = UpdatePublisherRequest::class;
}
