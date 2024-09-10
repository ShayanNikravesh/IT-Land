<?php

use Illuminate\Support\Facades\Route;

Route::get('index', function () {
    return view('admin/index');
});