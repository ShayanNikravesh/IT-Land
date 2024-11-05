<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\BrandController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\UserController;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $carousel_photos = Banner::with('photos')->findOrFail(1);
    $small_banner_photos = Banner::with('photos')->findOrFail(2);
    $medium_banner_photos = Banner::with('photos')->findOrFail(3);
    $products = Product::where('price_discounted','>',0)->with(['photos'=>function($query){$query->Limit(1);}])->take(6)->get();
    return view('user/index',compact('carousel_photos','small_banner_photos','medium_banner_photos','products'));
})->name('index');

//login & register
Route::get('login',function(){ return view('user.login'); })->name('login');
Route::post('login',[AuthController::class,'login'])->name('user-login');
Route::get('Confirm/{token}',[AuthController::class,'Confirm'])->name('Confirm');
Route::post('Verify/{token}',[AuthController::class,'Verify'])->name('Verify');
Route::get('logout',[AuthController::class,'logout'])->name('user-logout');
Route::get('ReSendOtpCode/{token}',[AuthController::class,'ReSendOtpCode'])->name('Resend_otp_code');

//category
Route::resource('Category',CategoryController::class);

//product
Route::resource('Product',ProductController::class);
Route::post('color_price',[ProductController::class,'getPriceByColor'])->name('color_price');
Route::get('search',[ProductController::class,'search'])->name('search');
Route::get('filter',[ProductController::class,'filter'])->name('filter');

//brand
Route::resource('Brand',BrandController::class);

//User profile
Route::resource('User',UserController::class);

//comments
Route::resource('Comment',CommentController::class);

//cart
Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::get('store/{product_id}/{color_id}',[CartController::class,'store'])->name('add_to_cart');
Route::get('remove/{id}',[CartController::class,'remove'])->name('remove_from_cart');
Route::get('clear',[CartController::class,'clear'])->name('cart_clear');
Route::post('Quantity/{id}/{status}',[CartController::class,'Quantity'])->name('cart-Quantity');

