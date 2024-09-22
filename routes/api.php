<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\IndexController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', [IndexController::class, 'index']);

Route::resource('/products',  Api\ProductController::class);
Route::resource('/orders',  Api\OrderController::class);
