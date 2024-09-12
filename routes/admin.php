<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

Route::get('index', function () {
    return view('admin/index');
})->name('index');

Route::resource('category', CategoryController::class);