<?php

use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ProductController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $carousel_photos = Banner::with('photos')->findOrFail(1);
    $small_banner_photos = Banner::with('photos')->findOrFail(2);
    $medium_banner_photos = Banner::with('photos')->findOrFail(3);
    return view('user/index',compact('carousel_photos','small_banner_photos','medium_banner_photos'));
});

Route::resource('Category',CategoryController::class);

Route::resource('Product',ProductController::class);

Route::resource('Brand',BrandController::class);

