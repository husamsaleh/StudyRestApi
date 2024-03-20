<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\CarController;

Route::group(['middleware' => 'api', 'namespace' => 'Api'], function () {
    Route::post('get-all-categories', [CategoriesController::class, 'index']);
});




Route::group(['middleware' => 'api'], function () {
 
    Route::post('get-all-cars', [CarController::class, 'index']);
});

