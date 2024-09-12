<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;

Route::get('index', function () {
    return view('admin/index');
})->name('index');

Route::resource('category', CategoryController::class);

Route::resource('brand',BrandController::class);