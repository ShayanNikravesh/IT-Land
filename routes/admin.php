<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\MemoryController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RamController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\RedirectAdmin;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;

//login page
Route::get('login-form',function(){
    return view('admin.login');
})->name('login-form')->middleware(RedirectAdmin::class);

//login
Route::post('admin-login',[AuthController::class,'login'])->name('admin-login');

Route::middleware([AdminAuth::class])->group(function () {
    
    Route::get('admin-index', function () {
        return view('admin.index');
    })->name('admin-index');

    //manager
    Route::resource('manager',ManagerController::class);
    Route::post('manager/ChangeStatus/{id}',[ManagerController::class,'ChangeStatus'])->name('change_Status_manager');
    Route::post('manager/ChangeLevel/{id}',[ManagerController::class,'ChangeLevel'])->name('change_Level_manager');

    //category
    Route::resource('category', CategoryController::class);
    Route::post('category/ChangeStatus/{id}', [CategoryController::class, 'ChangeStatus'])->name('change_Status_category');
    
    //brand
    Route::resource('brand',BrandController::class);
    Route::post('brand/ChangeStatus/{id}',[BrandController::class,'ChangeStatus'])->name('change_Status_brand');

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

    //product
    Route::resource('product',ProductController::class);
    Route::post('product/changeStatus/{id}/{status}',[ProductController::class,'changeStatus'])->name('change_Status_product');

    //article
    Route::resource('article',ArticleController::class);
    Route::post('storePhoto',[ArticleController::class,'storePhoto'])->name('store_article_photo');
    Route::post('article/changeStatus/{id}',[ArticleController::class,'changeStatus'])->name('change_Status_article');

    //logout
    Route::get('admin-logout', [AuthController::class, 'logout'])->name('admin-logout');

});

