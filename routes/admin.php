<?php

use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MemoryController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\RamController;

Route::get('index', function () {
    return view('admin/index');
})->name('index');

//category
Route::resource('category', CategoryController::class);

//brand
Route::resource('brand',BrandController::class);

//banner
Route::resource('banner',BannerController::class);

//photo
Route::resource('photo',PhotoController::class);

//color
Route::resource('color',ColorController::class);

//memory
Route::resource('memory',MemoryController::class);

//ram
Route::resource('ram',RamController::class);