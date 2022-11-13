<?php

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
    Route::group(['prefix' => 'authors'], function () {
        Route::get('/', 'App\Http\Controllers\V1\AuthorController@index');
        Route::post('/', 'App\Http\Controllers\V1\AuthorController@store');
        Route::get('/{id}', 'App\Http\Controllers\V1\AuthorController@show');
        Route::put('/{id}', 'App\Http\Controllers\V1\AuthorController@update');
        Route::delete('/{id}', 'App\Http\Controllers\V1\AuthorController@destroy');
    });

    Route::group(['prefix' => 'books'], function () {
        Route::get('/', 'App\Http\Controllers\V1\BookController@index');
        Route::post('/', 'App\Http\Controllers\V1\BookController@store');
        Route::get('/{id}', 'App\Http\Controllers\V1\BookController@show');
        Route::put('/{id}', 'App\Http\Controllers\V1\BookController@update');
        Route::delete('/{id}', 'App\Http\Controllers\V1\BookController@destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'App\Http\Controllers\V1\CategoryController@index');
        Route::post('/', 'App\Http\Controllers\V1\CategoryController@store');
        Route::get('/{id}', 'App\Http\Controllers\V1\CategoryController@show');
        Route::put('/{id}', 'App\Http\Controllers\V1\CategoryController@update');
        Route::delete('/{id}', 'App\Http\Controllers\V1\CategoryController@destroy');
    });

    Route::group(['prefix' => 'publishers'], function () {
        Route::get('/', 'App\Http\Controllers\V1\PublisherController@index');
        Route::post('/', 'App\Http\Controllers\V1\PublisherController@store');
        Route::get('/{id}', 'App\Http\Controllers\V1\PublisherController@show');
        Route::put('/{id}', 'App\Http\Controllers\V1\PublisherController@update');
        Route::delete('/{id}', 'App\Http\Controllers\V1\PublisherController@destroy');
    });

    Route::get('/book-seeder', 'App\Http\Controllers\V1\BookController@bookSeeder');
});
