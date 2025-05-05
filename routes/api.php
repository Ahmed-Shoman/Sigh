<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\FeatureSectionController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SighContentController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DistinctiveProductController;
use App\Http\Controllers\Api\CoffeeCultureController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([LanguageMiddleware::class])->group(function () {

Route::get('settings',[SettingController::class,'index']);
Route::get('slider',[SliderController::class,'index']);
Route::get('products',[ProductController::class,'index']);
Route::get('blogs',[BlogController::class,'index']);
Route::apiResource('sigh-contents', SighContentController::class);
Route::apiResource('feature-sections', FeatureSectionController::class);
Route::apiResource('distinctive-products', DistinctiveProductController::class);
Route::apiResource('coffee-cultures', CoffeeCultureController::class);
});
/////