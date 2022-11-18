<?php

use App\Http\Controllers\V1\AuthorController;
use App\Http\Controllers\V1\BookController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\CategoryGroupController;
use App\Http\Controllers\V1\PublisherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::apiResource('authors', AuthorController::class)->parameter('authors', 'id');
    Route::apiResource('books', BookController::class)->parameter('books', 'id');
    Route::apiResource('categories', CategoryController::class)->parameter('categories', 'id');
    Route::apiResource('category-groups', CategoryGroupController::class)->parameter('category-groups', 'id');
    Route::apiResource('publishers', PublisherController::class)->parameter('publishers', 'id');
});
