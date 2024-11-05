@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="container mt-xxxx-large">
    <!--    Cart:start-->
    <div class="cart">
        {{-- <ul class="nav nav-tabs">
            <li class="nav-item fs-7"><a class="nav-link active custom-link" href="#cart" data-bs-toggle="tab">
                سبد خرید
                <span class="badge bg-danger">2</span>
            </a></li>
            <li class="nav-item fs-7"><a class="nav-link custom-link" href="#nextCart" data-bs-toggle="tab">
                لیست خرید بعدی
                <span class="badge bg-secondary">2</span>
            </a></li>
        </ul> --}}
        <div class="tab-content p-3">
            <!--Cart:start-->
            <div class="tab-pane fade show active text-center" id="cart">
                @if (count($cart_products) > 0)
                    <div class="row">
                        <!--Products In Cart:start-->
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9 border border-radius-xl">
                            <!--Cart Header:start-->
                            <div class="cart-header d-flex justify-content-between align-items-center my-4">
                                <p class="fw-bold">
                                    سبد خرید شما
                                    <span class="fs-8 gray-600 d-block text-start">{{count($cart_products)}} کالا</span>
                                </p>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <circle fill="#000000" cx="12" cy="5" r="2"/>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"/>
                                                    <circle fill="#000000" cx="12" cy="19" r="2"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('cart_clear')}}">حذف همه</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--Cart Header:end-->

                            <!--Cart Content:start-->
                            <div class="cart-content">
                                <!--Shopping Cart Box:start-->
                                <div class="card shopping-cart-box border-0">
                                    <!--Cart Body:start-->
                                    <div class="card-body cartParent">
                                        @foreach ($cart_products as $product)
                                            <!--Shopping Cart Item:start-->
                                            <div class="shopping-cart-item py-3 border-bottom-gray-150" id="cart_item_{{$product->id}}">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3">
                                                        <!--Shopping Cart Item Right:start-->
                                                        <div class="shopping-cart-item-right me-3">
                                                            <img src="{{asset($product->attributes->photo)}}" alt="image" class="object-contain">
                                                            <div class="shop-item-edit-box d-flex justify-content-between align-items-center px-3 pt-2 pb-1 border-radius-xl">
                                                                <span onclick="ProductQuantity('{{$product->id}}','plus')"><i class="fas fa-plus"></i></span>
                                                                <span class="fs-5" id="cart_quantity_{{$product->id}}">{{$product->quantity}}</span>
                                                                <span onclick="ProductQuantity('{{$product->id}}','minus')" id="trash_quantity_{{$product->id}}" ><span id="product_minus_{{$product->id}}"><i class="far {{$product->quantity > 1 ? 'fas fa-minus' :'fa-trash-alt'}} "></i></span></span>
                                                            </div>
                                                        </div>
                                                        <!--Shopping Cart Item Right:end-->
                                                    </div>
                                                    <div class="col-sm-12 col-md-7 col-lg-8 col-xl-9 mt-4">
                                                        <!--Shopping Cart Item Left:start-->
                                                        <div class="shopping-cart-item-left text-start">
                                                            <h3 class="fs-6">{{$product->name}}</h3>
                                                            <span class="d-block mt-1 fs-8">
                                                            <i class="far fa-check-circle text-success align-middle me-1"></i>
                                                            موجود در انبار آیتی لند
                                                        </span>
                                                        <span class="d-block mt-1 fs-8">
                                                            <i class="fas fa-truck-moving gray-500 align-middle me-1"></i>
                                                            آماده ارسال
                                                        </span>
                                                            <span class="fs-4 pt-3 d-block">
                                                                @if ($product->attributes->price_discounted == null)
                                                                    <span class="productPrice">{{priceFormatter($product->price)}}</span>
                                                                @else
                                                                    <span class="productPrice text-danger">{{priceFormatter($product->price)}}</span>
                                                                    <br>
                                                                    <span class="productPrice">{{priceFormatter($product->attributes->price_discounted)}}</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <!--Shopping Cart Item Left:end-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Shopping Cart Item:end-->
                                        @endforeach
                                    </div>
                                    <!--Cart Body:end-->
                                </div>
                                <!--Shopping Cart Box:end-->

                            </div>
                            <!--Cart Content:end-->
                        </div>
                        <!--Products In Cart:end-->

                        <!--Products Prices:start-->
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-3">
                            <div class="cart-cal border border-radius-xl overflow-hidden">
                                <!--All Prices:start-->
                                <div class="all-price d-flex justify-content-between align-items-center mb-3 px-3 pt-2">
                                    <p class="fs-7 fw-bold">
                                        قیمت کالاها
                                        <span>({{count($cart_products)}})</span>
                                    </p>
                                    <p class="fs-7 gray-600 fw-bold">
                                        {{priceFormatter($total)}}
                                    </p>
                                </div>
                                <!--All Prices:end-->

                                <!--All Prices Discounted:start-->
                                <div class="all-price-discounted d-flex justify-content-between align-items-center mb-3 px-3 pt-2">
                                    <p class="fs-7 fw-bold">
                                        جمع سبد خرید :
                                    </p>
                                    <p class="fs-7 gray-600 fw-bold">
                                        {{priceFormatter($total)}}
                                    </p>
                                </div>
                                <!--All Prices Discounted:end-->

                                <!--Purchase:start-->
                                <div class="purchase-profit d-flex justify-content-between align-items-center mb-3 px-3 pt-1">
                                    <p class="fs-7 fw-bold text-danger">
                                        سود شما از خرید
                                    </p>
                                    <p class="fs-6 fw-bold text-danger">
                                        100,000 تومان
                                    </p>
                                </div>
                                <!-- Purchase:end-->

                                <!--Checkout Btn:start-->
                                @if (Auth::guard('web')->check())
                                    <div class="d-grid gap-2 p-3">
                                        <a href="" class="btn custom-btn-danger border-radius-xl">ثبت سفارش</a>
                                    </div>
                                @else
                                    <div class="d-grid gap-2 p-3">
                                        <button class="btn bg-warning border-radius-xl">برای ثبت سفارش وارد سایت شوید.</button>
                                    </div>
                                @endif
                                <!--Checkout Btn:end-->
                                
                            </div>
                            <p class="text-start mt-3 fs-8">
                                هزینه این سفارش هنوز پرداخت نشده‌ و در صورت اتمام موجودی، کالاها از سبد حذف می‌شوند.
                            </p>
                        </div>
                        <!--Products Prices:end-->
                    </div>
                @else
                    <!--Cart Empty:start-->
                    <div class="tab-pane fade show active text-center" id="cart">
                        <div class="cart-empty border border-radius-3xl py-5">
                            <img src="{{asset('user-assets/img/empty-cart.svg')}}" alt="">
                            <p class="fs-5 fw-bold mt-3">سبد خرید شما خالی است!</p>
                        </div>
                    </div>
                    <!--Cart Empty:end-->
                @endif
            </div>
            <!--Cart:end-->
        </div>
    </div>
    <!--Cart:end-->
</main>
<!--Main:end-->

@endsection()