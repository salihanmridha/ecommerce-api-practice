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

//Route::controller(\App\Http\Controllers\Api\CategoryController::class)->group(function(){
//    Route::get("categories", "index");
//    Route::get("categories/{category}", "show");
//    Route::post("categories", "store");
//    Route::put("categories/{category}", "update");
//    Route::delete("categories/{category}", "destroy");
//});

Route::apiResource( "categories", \App\Http\Controllers\Api\CategoryController::class);

Route::controller(\App\Http\Controllers\Api\ProductController::class)->group(function(){
    Route::get("products", "index");
    Route::get("products/{product}", "show");
});

