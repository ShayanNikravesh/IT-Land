<!DOCTYPE html>
<html dir="rtl" lang="fa">
<!--Head::start-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IT Land</title>

    <!--Bootstrap 5 RTL-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/bootstrap/bootstrap.rtl.css')}}">
    <!--Fontawesome 5-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/fontawesome/fontawesome.min.css')}}">
    <!--SwiperJs Styles-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/swiper/swiper-bundle.min.css')}}">
    <!--Main Styles-->
    <link rel="stylesheet" href="{{asset('user-assets/css/style.css')}}">
    <!--Single product-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/xzoom/xzoom.min.css')}}">
</head>
<!--Head::end-->

<!--Body::start-->
<body>

@routes

<!--Navbar:start-->
<div class="custom-navbar" id="customNavbar">
    <!--Ads Banner:start-->
    <a href="" class="ads-banner" title="">
        <img src="{{asset('user-assets/img/ads-banner.jpg')}}" alt="" class="img-fluid object-cover">
    </a>
    <!--Ads Banner:end-->

    <!--Top Navbar::start-->
    <div class="top-navbar navbar-expand-lg navbar-light py-2">
        <!--Container:start-->
        <div class="container d-flex justify-content-between align-items-center">
            <!--Top Navbar Right:start-->
            <div class="top-nav-right d-flex justify-content-between align-items-center">
                <!--Logo:start-->
                <a href="{{route('index')}}" class="navbar-brand" title="">
                    <img src="{{asset('user-assets/img/it land.jpg')}}" style="width: 4rem" alt="لوگوی برگ شاپ">
                </a>
                <!--Logo:end-->

                <!--Search Form:start-->
                <div class="main-search position-relative">
                    <form action="{{route('search')}}" method="GET" class="position-relative" id="searchForm">
                        <input class="form-control border-0 border-radius-xl bg-gray-150 fs-7" name="search" type="search" placeholder="جستجو" id="mainSearchInput" autocomplete="off">
                        <button class="btn position-absolute" type="submit">
                            <i class="fab fa-sistrix fw-md fs-5 gray-500"></i>
                        </button>
                    </form>
                    <div class="search-results custom-box-shadow-s-2" style="display: none;">
                        <span class="py-2 px-3 d-block fs-7">نتایج جست و جو :</span>
                    </div>
                </div>
                <!--Search Form:end-->
            </div>
            <!--Top Navbar Right:end-->

            <!--Top Navbar Left:start-->
            <div class="top-nav-left d-flex justify-content-between align-items-center">
                
                @if (Auth::guard('web')->check())
                   <!--User Panel Menu:start-->
                    <div class="dropdown user-panel-menu">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                            <!--begin::Svg Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item fw-bold py-3" href="{{route('User.index')}}">
                                    <i class="fa fa-user-circle fs-3 align-middle gray-400 pe-1"></i>
                                    @if (Auth::guard('web')->user()->first_name)
                                        {{Auth::guard('web')->user()->first_name.' '.Auth::guard('web')->user()->last_name}}
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-2 fw-bold" href="#">
                                    <span class="pe-1">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    سفارش ها
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item  py-2 fw-bold" href="{{route('show-favorites')}}">
                                    <span class="pe-1">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    علاقه مندی ها
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item  py-2 fw-bold" href="{{route('Comment.index')}}">
                                    <span class="pe-1">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"/>
                                                <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    دیدگاه ها
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item  py-3 fw-bold" href="{{route('user-logout')}}">
                                    <span class="pe-1">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                                <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
                                                <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    خروج از حساب کاربری
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--User Panel Menu:end-->
                @else
                    <!--Login and Register:start-->
                    <a href="{{route('login')}}" class="btn me-3 border-gray-300 border-radius-xl fs-7" title="">
                        <!--begin::Svg Icon -->
                        <svg class="rotate-3d me-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
                                <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                        ورود | ثبت نام
                    </a>
                    <!--Login and Register:end-->
                @endif

                <!--Horizontal Line:start-->
                <span class="horizontal-line"></span>
                <!--Horizontal Line:end-->

                <!--Shopping Cart:start-->
                <div class="shopping-cart-wrapper position-relative ms-2">
                    <!--Shopping Cart Button:start-->
                    <a href="{{route('cart')}}" target="_blank" class="btn shopping-cart-btn position-relative border-radius-xl" title="">
                        <!--begin::Svg Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
                                <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                        {{-- <span class="badge position-absolute shop-cart-badge border border-white">{{count($cart_products)}}</span> --}}
                    </a>
                    <!--Shopping Cart Button:end-->

                    {{-- @if (count($cart_products) > 0)
                        <!--Shopping Cart Box:start-->
                        <div class="card shopping-cart-box position-absolute border-0 custom-box-shadow-s-1 overflow-hidden border-radius-xl">
                            <!--Cart Header:start-->
                            <div class="card-header d-flex justify-content-between align-items-center bg-white fs-7">
                                <span><span class="countOfProducts">3</span> کالا</span>
                                <a href="{{route('cart')}}" class="text-info fw-bold" title="">
                                    مشاهده سبد خرید
                                    <i class="fa fa-angle-left ms-1"></i>
                                </a>
                            </div>
                            <!--Cart Header:end-->

                            <!--Cart Body:start-->
                            <div class="card-body cartParent">
                                <!--Shopping Cart Item:start-->
                                <div class="shopping-cart-item d-flex justify-content-between align-items-center py-3 border-bottom-gray-150">
                                    <!--Shopping Cart Item Right:start-->
                                    <div class="shopping-cart-item-right me-3">
                                        <img src="{{asset($product->attributes->photo)}}" alt="image" class="object-contain">
                                        <div class="shop-item-edit-box d-flex justify-content-between align-items-center px-3 pt-2 pb-1 border-radius-xl">
                                            <span class="addition"><i class="fas fa-plus"></i></span>
                                            <span class="fs-5">1</span>
                                            <span class="decrease"><i class="far fa-trash-alt"></i></span>
                                        </div>
                                    </div>
                                    <!--Shopping Cart Item Right:end-->

                                    <!--Shopping Cart Item Left:start-->
                                    <div class="shopping-cart-item-left">
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
                                            <span class="productPrice">{{priceFormatter($product->price)}}</span>
                                        </span>
                                    </div>
                                    <!--Shopping Cart Item Left:end-->
                                </div>
                                <!--Shopping Cart Item:end-->
                            </div>
                            <!--Cart Body:end-->

                            <!--Cart Footer:start-->
                            <div class="card-footer bg-white bottom-0 d-flex justify-content-between align-items-center">
                                <!--Shopping Cart Footer Right:start-->
                                <div class="card-footer-right">
                                    <span class="d-block text-muted fs-7">مبلغ قابل پرداخت :</span>
                                    <span class="fs-5 fw-bold d-block mt-1"><span class="allPrices">{{priceFormatter($total)}}</span></span>
                                </div>
                                <!--Shopping Cart Footer Right:end-->

                                <!--Shopping Cart Footer Left:start-->
                                <div class="card-footer-left">
                                    <a href="" class="btn custom-btn-danger border-radius-xl fs-6" title="">ثبت سفارش</a>
                                </div>
                                <!--Shopping Cart Footer Left:end-->
                            </div>
                            <!--Cart Footer:end-->
                        </div>
                        <!--Shopping Cart Box:end-->
                    @endif --}}
                    
                </div>
                <!--Shopping Cart:end-->
            </div>
            <!--Top Navbar Left:end-->
        </div>
        <!--Container:end-->

        <!--Top Mobile Navbar In Mobile :start-->
        <div class="top-mobile-navbar border-bottom-gray-150" id="topMobileNavbar">
            <!--Container:start-->
            <div class="container d-flex justify-content-between align-items-center">
                <!--Top Mobile Navbar Right:start-->
                <div class="top-mobile-navbar-right d-flex justify-content-between align-items-center">
                    <!--Humber Btn:start-->
                    <a href="javascript:void(0)" class="navbar-brand openNavbarBtn">
                        <!--begin::Svg Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                      fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </a>
                    <!--Humber Btn:end-->

                    <!--Navbar Items:start-->
                    <div class="navbar-items-mobile">
                        <!--Navbar Items Mobile Header:start-->
                        <div class="navbar-items-mobile-header d-flex justify-content-between align-items-center border-bottom-gray-300 p-3">
                            <!--Navbar Items Mobile Title:start-->
                            <div class="navbar-items-mobile-title">
                                <h5 class="fw-bold">منوی آیتی لند</h5>
                            </div>
                            <!--Navbar Items Mobile Title:end-->

                            <!--Navbar Items Mobile Close Button:start-->
                            <div class="navbar-items-mobile-close-btn">
                                <i class="fa fa-times fs-5"></i>
                            </div>
                            <!--Navbar Items Mobile Close Button:end-->
                        </div>
                        <!--Navbar Items Mobile Header:end-->

                        <!--Navbar Items Mobile Body:start-->
                        <div class="navbar-items-mobile-body p-3">
                            <ul class="navbar-parent">
                                <li class="border-bottom-gray-150 px-2 py-3">
                                    <a href="" class="fs-6 fw-bold d-block showSubMenu">
                                        <!--begin::Svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z"
                                                      fill="#000000" opacity="0.3"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                        دسته بندی ها
                                        <i class="fa fa-angle-left float-end"></i>
                                    </a>
                                    <!--Navbar Items Child:start-->
                                    <ul class="first-child-parent p-3">
                                        <li class="fs-5 border-bottom-gray-300 pb-2 fw-bold text-center">
                                            دسته بندی ها
                                        </li>
                                        <li class="py-3"><a href="javascript:void(0)" class="cyan-500 fs-6 backToProductCategories"><i class="fa fa-arrow-right me-2"></i>بازگشت</a></li>
                                        @foreach ($parent_categories as $parent_category)
                                            <li class="border-bottom-gray-150 px-2 py-3">
                                                <a href="javascript:;" class="fs-6 fw-bold d-block showSubMenu2" title="">
                                                    {{$parent_category->title}}
                                                    <i class="fa fa-angle-left float-end"></i>
                                                </a>
                                                <ul class="first-child-parent p-3">
                                                    @php
                                                        $found = false;
                                                    @endphp
                                                    <li class="fs-5 border-bottom-gray-300 pb-2 fw-bold text-center">
                                                        {{$parent_category->title}}
                                                    </li>
                                                    <li class="py-3"><a href="javascript:void(0)" class="cyan-500 fs-6 backToProductCategories"><i class="fa fa-arrow-right me-2"></i>بازگشت</a></li>
                                                    @foreach ($categories as $category)
                                                        @if ($category->parent_id == $parent_category->id)
                                                            <li class="border-bottom-gray-150 px-2 py-3">
                                                                <a href="{{route('Category.show',$category->id)}}" title="">
                                                                    {{$category->title}}
                                                                </a>
                                                            </li>
                                                            @php
                                                                $found = true;
                                                            @endphp
                                                        @endif 
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!--Navbar Items Child:end-->
                                </li>
                                <li class="border-bottom-gray-150 px-2 py-3">
                                    <a href="" class="fs-6 fw-bold d-block showSubMenu">
                                        <!--begin::Svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z"
                                                      fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                        برندها
                                        <i class="fa fa-angle-left float-end"></i>
                                    </a>

                                    <!--Navbar Items Child:start-->
                                    <ul class="first-child-parent p-3">
                                        <li class="fs-5 border-bottom-gray-300 pb-2 fw-bold text-center">
                                            برندها
                                        </li>
                                        <li class="py-3"><a href="javascript:void(0)"class="cyan-500 fs-6 backToProductCategories"><iclass="fa fa-arrow-right me-2"></i>بازگشت</a></li>
                                        @foreach ($brands as $brand)
                                            <li class="border-bottom-gray-150 px-2 py-3">
                                                <a href="{{route('Brand.show',$brand->id)}}" class="fs-6 fw-bold d-block" title="">
                                                    {{$brand->title}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!--Navbar Items Child:end-->

                                </li>
                                <li class="border-bottom-gray-150 px-2 py-3">
                                    <a href="{{route('blogs')}}" class="fs-6 fw-bold d-block">
                                        <!--begin::Svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                            <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                                        </svg>
                                        <!--end::Svg Icon-->
                                        مقاله ها
                                    </a>
                                </li> 
                                <li class="border-bottom-gray-150 px-2 py-3">
                                    <a href="{{route('about-us')}}" class="fs-6 fw-bold d-block">
                                        <!--begin::Svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                        </svg>
                                        <!--end::Svg Icon-->
                                        درباره ما 
                                    </a>
                                </li>     
                            </ul>
                        </div>
                        <!--Navbar Items Mobile Body:end-->

                    </div>
                    <!--Navbar Items:end-->
                </div>
                <!--Top Mobile Navbar Right:end-->

                <!--Top Mobile Navbar Middle:start-->
                <div class="top-mobile-navbar-middle d-flex justify-content-between align-items-center">
                    <!--Logo:start-->
                    <a href="{{route('index')}}" class="navbar-brand pb-2" title="">
                        <img src="{{asset('user-assets/img/logo.png')}}" alt="لوگوی برگ شاپ">
                    </a>
                    <!--Logo:end-->
                </div>
                <!--Top Mobile Navbar Middle:end-->

            </div>
            <!--Container:end-->
        </div>
        <!--Top Mobile Navbar In Mobile:end-->
    </div>
    <!--Top Navbar::end-->

    <!--Main Navbar::start-->
    <nav class="main-navbar navbar navbar-expand-lg navbar-light bg-light custom-box-shadow-s-1-bottom py-1 w-100" id="mainNavbar">
        <!--Container:start-->
        <div class="container d-flex justify-content-between align-items-center">
            <!--Navbar Right:start-->
            <div class="navbar-right">
                <!--Navbar Wrapper:start-->
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-between align-items-center position-relative">
                    <!--Navbar Item:start-->
                    <li class="nav-item d-flex justify-content-between align-items-center position-relative">
                        <a class="mx-2 py-2" href="javascript:;" title="">
                            <!--begin::Svg Icon-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                            <!--end::Svg Icon-->
                            دسته بندی کالاها
                        </a>
                        <!--Navbar Child Wrapper:start-->
                        <ul class="position-absolute nav-item-submenu bg-white custom-box-shadow-s-2">
                            @foreach ($parent_categories as $parent_category)
                                <!--Navbar Item Child:start-->
                                <li class="nav-item-submenu-child">
                                    <a href="javascript:;" class="fw-bold" title="">
                                        <!--begin::Svg Icon-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z"
                                                    fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                        {{$parent_category->title}}
                                        <i class="fa fa-angle-left float-end"></i>
                                    </a>
                                    @php
                                        $found = false;
                                    @endphp
                                    <!--Navbar Item Sub Child Wrapper:start-->
                                    <ul class="position-absolute top-0 bg-white custom-box-shadow-s-2">
                                        @foreach ($categories as $category)
                                            @if ($category->parent_id == $parent_category->id)
                                                <!--Navbar Item Sub Child:start-->
                                                <li>
                                                    <a href="{{route('Category.show',$category->id)}}" title="">
                                                        {{$category->title}}
                                                    </a>
                                                </li>
                                                <!--Navbar Item Sub Child:end-->
                                                @php
                                                    $found = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if (!$found)
                                        <li>
                                            <a href="javascript:;" title="">
                                                زیر مجوعه ندارد.
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                    <!--Navbar Item Sub Child Wrapper:end-->
                                </li>
                                <!--Navbar Item Child:end-->
                            @endforeach
                        </ul>
                        <!--Navbar Child Wrapper:end-->
                        <!--Navbar Item:start-->
                        <span class="horizontal-line mx-1 me-2"></span>
                        <!--Navbar Item:end-->
                    </li>
                    <!--Navbar Item:end-->
                    <!--Navbar Item:start-->
                    <li class="nav-item d-flex justify-content-between align-items-center me-2 position-relative">

                        <a class="mx-2 py-2" href="category.html" title="">
                            <!--begin::Svg Icon-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postage" viewBox="0 0 16 16">
                                <path d="M4.75 3a.75.75 0 0 0-.75.75v8.5c0 .414.336.75.75.75h6.5a.75.75 0 0 0 .75-.75v-8.5a.75.75 0 0 0-.75-.75zM11 12H5V4h6z"/>
                                <path d="M3.5 1a1 1 0 0 0 1-1h1a1 1 0 0 0 2 0h1a1 1 0 0 0 2 0h1a1 1 0 1 0 2 0H15v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1h-1.5a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0h-1a1 1 0 1 0-2 0H1v-1a1 1 0 1 0 0-2v-1a1 1 0 1 0 0-2V9a1 1 0 1 0 0-2V6a1 1 0 0 0 0-2V3a1 1 0 0 0 0-2V0h1.5a1 1 0 0 0 1 1M3 3v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1"/>
                            </svg>
                            <!--end::Svg Icon-->
                            برندها
                        </a>
                        <!--Navbar Child Wrapper:start-->
                        <ul class="position-absolute bg-white custom-box-shadow-s-2 nav-item-submenu">
                            @foreach ($brands as $brand)
                                <!--Navbar Item Child:start-->
                                <li class="nav-item-submenu-child">
                                    <a href="{{route('Brand.show',$brand->id)}}" title="">{{$brand->title}}</a>
                                </li>
                                <!--Navbar Item Child:end-->
                            @endforeach
                        </ul>
                        <!--Navbar Child Wrapper:end-->
                    </li>
                    <!--Navbar Item:end-->
                    <!--Navbar Item:start-->
                    <li class="nav-item d-flex justify-content-between align-items-center me-3">
                        <!--begin::Svg Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                            <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5M5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1z"/>
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                        </svg>
                        <!--end::Svg Icon-->
                        <a class="mx-2 py-2" href="{{route('blogs')}}">مقاله ها</a>
                    </li>
                    <!--Navbar Item:end-->
                    <li class="nav-item d-flex justify-content-between align-items-center me-3">
                        <!--begin::Svg Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                        </svg>
                        <!--end::Svg Icon-->
                        <a class="mx-2 py-2" href="{{route('about-us')}}">درباره ما</a>
                    </li>
                    <!--Navbar Item:end-->
                </ul>
                <!--Navbar Wrapper:end-->
            </div>
            <!--Navbar Right:end-->

            <!--Navbar Left:start-->
            <div class="navbar-left">
                <!--Navbar Item:start-->
                <!--Navbar Item:end-->
            </div>
            <!--Navbar Left:end-->
        </div>
        <!--Container:end-->

        <!--Main Mobile Navbar:start-->
        <div class="main-mobile-navbar pb-1">
            <!--Container:start-->
            <div class="container d-flex justify-content-between align-items-center">
                <!--Main Mobile Navbar Right:start-->
                <div class="main-mobile-navbar-right">
                    <!--Search Form:start-->
                    <form action="{{route('search')}}" method="GET" class="position-relative" id="searchForm">
                        <input class="form-control border-0 border-radius-xl bg-gray-150 fs-7" name="search" type="search" placeholder="جستجو" id="mainSearchInput" autocomplete="off">
                        <button class="btn position-absolute" type="submit">
                            <i class="fab fa-sistrix fw-md fs-5 gray-500"></i>
                        </button>
                    </form>
                    <!--Search Form:end-->
                </div>
                <!--Main Mobile Navbar Right:end-->

                <!--Main Mobile Navbar Left:start-->
                <div class="main-mobile-navbar-left">
                    @if (Auth::guard('web')->check())
                        <!--User Panel Menu:start-->
                        <div class="dropdown user-panel-menu">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <!--begin::Svg Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item fw-bold py-3" href="{{route('User.index')}}">
                                        <i class="fa fa-user-circle fs-3 align-middle gray-400 pe-1"></i>
                                        @if (Auth::guard('web')->user()->first_name)
                                            {{Auth::guard('web')->user()->first_name.' '.Auth::guard('web')->user()->last_name}}
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item py-2 fw-bold" href="#">
                                        <span class="pe-1">
                                            <!--begin::Svg Icon-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z M14,9 L14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 L10,9 L8,9 L8,8 C8,5.790861 9.790861,4 12,4 C14.209139,4 16,5.790861 16,8 L16,9 L14,9 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M6.84712709,9 L17.1528729,9 C17.6417121,9 18.0589022,9.35341304 18.1392668,9.83560101 L19.611867,18.671202 C19.7934571,19.7607427 19.0574178,20.7911977 17.9678771,20.9727878 C17.8592143,20.9908983 17.7492409,21 17.6390792,21 L6.36092084,21 C5.25635134,21 4.36092084,20.1045695 4.36092084,19 C4.36092084,18.8898383 4.37002252,18.7798649 4.388133,18.671202 L5.86073316,9.83560101 C5.94109783,9.35341304 6.35828794,9 6.84712709,9 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        سفارش ها
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item  py-2 fw-bold" href="{{route('show-favorites')}}">
                                        <span class="pe-1">
                                            <!--begin::Svg Icon-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        علاقه مندی ها
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item  py-2 fw-bold" href="{{route('Comment.index')}}">
                                        <span class="pe-1">
                                            <!--begin::Svg Icon-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"/>
                                                    <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>
                                        دیدگاه ها
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item  py-3 fw-bold" href="{{route('user-logout')}}">
                                        <span class="pe-1">
                                            <!--begin::Svg Icon-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                                    <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1"/>
                                                    <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        خروج از حساب کاربری
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--User Panel Menu:end-->
                    @else
                        <!--Login and Register:start-->
                        <a href="{{route('login')}}" class="btn text-dark-blue border-radius-xl" title="">
                            <!--begin::Svg Icon -->
                            <svg class="rotate-3d me-1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                                        x="13" y="6" width="2" height="12" rx="1"/>
                                    <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                            ورود
                        </a>
                        <!--Login and Register:end-->
                    @endif 
                    <!--Shopping Cart Button:start-->
                    <a href="{{route('cart')}}" target="_blank" class="btn shopping-cart-btn p-2 border-radius-xl position-relative" title="">
                        <!--begin::Svg Icon-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z"
                                      fill="#000000" opacity="0.3"/>
                                <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z"
                                      fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                        {{-- <span class="badge bg-primary position-absolute shop-cart-badge border border-white border-2 border-radius-xl">4</span> --}}
                    </a>
                    <!--Shopping Cart Button:end-->
                </div>
                <!--Main Mobile Navbar Left:end-->
            </div>
            <!--Container:end-->
        </div>
        <!--Main Mobile Navbar:end-->
        
    </nav>
    <!--Main Navbar::end-->

</div>
<!--Navbar:end-->


<!-- content start -->
 @yield('content')
<!-- content end -->


<!--Footer:start-->
<footer class="footer mt-5">
    <div class="container">
        <div class="footer-top mt-4 mb-5">
            <!--            Footer Top Detail:start-->
            <div class="footer-top-detial d-flex justify-content-between align-items-center">
                <div class="">
                    <a href="" title=""><img src="{{asset('user-assets/img/logo-md.png')}}" alt=""></a>
                    <p class="mt-2 fs-7">تلفن پشتیبانی : 0000000</p>
                </div>
                <a href="#top" class="back-to-top border-radius-xl px-3 py-2 gray-600 fs-7">
                    برگشت به بالا
                    <i class="fa fa-angle-up ps-2"></i>
                </a>
            </div>
            <!--Footer Top Detail:end-->

            <!--Footer Top Attr:start-->
            <div class="footer-top-attr d-flex justify-content-between align-items-center my-5">
                <!--Top Right Item:start-->
                <div class="top-right-item text-center">
                    <img src="{{asset('user-assets/img/express-delivery.svg')}}" alt="" title="">
                    <p class="mt-2 fs-8">امکان تحویل اکسپرس</p>
                </div>
                <!--Top Right Item:end-->

                <!--Top Right Item:start-->
                <div class="top-right-item text-center">
                    <img src="{{asset('user-assets/img/support.svg')}}" alt="" title="">
                    <p class="mt-2 fs-8">7 روز هفته، 24 ساعته</p>
                </div>
                <!--Top Right Item:end-->

                <!--Top Right Item:start-->
                <div class="top-right-item text-center">
                    <img src="{{asset('user-assets/img/days-return.svg')}}" alt="" title="">
                    <p class="mt-2 fs-8">هفت روز ضمانت بازگشت کالا</p>
                </div>
                <!--Top Right Item:end-->

                <!--Top Right Item:start-->
                <div class="top-right-item text-center">
                    <img src="{{asset('user-assets/img/original-products.svg')}}" alt="" title="">
                    <p class="mt-2 fs-8">ضمانت اصالت کالا</p>
                </div>
                <!--Top Right Item:end-->
            </div>
            <!--Footer Top Attr:end-->
        </div>
        <div class="footer-main my-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <p class="fw-bold fs-6">راهنمای خرید از آیتی لند</p>
                    <ul>
                        <li class="my-2"><a href="">نحوه ثبت سفارش</a></li>
                        <li class="my-2"><a href="">رویه ارسال سفارش</a></li>
                        <li class="my-2"><a href="">شیوه های پرداخت</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <p class="fw-bold fs-6">خدمات مشتریان</p>
                    <ul>
                        <li class="my-2"><a href="">پاسخ به پرسش های متدوال</a></li>
                        <li class="my-2"><a href="">رویه های بازگشت کالا</a></li>
                        <li class="my-2"><a href="">شرایط استفاده</a></li>
                        <li class="my-2"><a href="">حریم خصوصی</a></li>
                        <li class="my-2"><a href="">گزارش باگ</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                    <p class="fw-bold fs-6">همراه ما باشید!</p>
                    <ul class="social-list d-flex justify-content-around align-items-center mt-3">
                        <li class="my-2 instagram">
                            <a href="">
                                <i class="fab fa-instagram fa-2x gray-500"></i>
                            </a>
                        </li>
                        <li class="my-2 twitter">
                            <a href="">
                                <i class="fab fa-twitter fa-2x gray-500"></i>
                            </a>
                        </li>
                        <li class="my-2 linkedin">
                            <a href="">
                                <i class="fab fa-linkedin fa-2x gray-500"></i>
                            </a>
                        </li>
                        <li class="my-2 telegram">
                            <a href="">
                                <i class="fab fa-telegram fa-2x gray-500"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-info py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-3">
                    <h1 class="fw-bold fs-5">فروشگاه آیتی لند ، بررسی ، انتخاب و خرید آنلاین.</h1>
                    <p class="gray-600 mt-3 fs-7">
                        خرید اینترنتی مطمئن، نیازمند فروشگاهی است که بتواند کالاهایی متنوع، باکیفیت و دارای قیمت مناسب
                        را در مدت زمانی کوتاه به دست مشتریان خود برساند و ضمانت بازگشت کالا هم داشته باشد؛ ویژگی‌هایی که
                        فروشگاه آیتی لند سال‌هاست بر روی آن‌ها کار کرده و توانسته از این طریق مشتریان ثابت خود
                        را داشته باشد.
                    </p>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3 d-flex justify-content-evenly align-items-center">
                    <img src="{{asset('user-assets/img/symbol-01.png')}}" alt="" title="" class="img-fluid border border-gray-200 border-radius-xl">
                    <img src="{{asset('user-assets/img/symbol-02.png')}}" alt="" title="" class="img-fluid border border-gray-200 border-radius-xl">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-4">
        <div class="container">
            <p class="fs-8 gray-600">
                طراحی شده توسط شایان نیک روش
            </p>
        </div>
    </div>
</footer>
<!--Footer:End-->

{{-- <!--Chat Widget:start-->
<div class="chat-widget border-radius-2xl custom-box-shadow-s-1">
    <!--Chat Widget Icon:start-->
    <a href="javascript:void(0)" class="openChatBoxBtn">
        <!--begin::Svg Icon-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
             viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L5,18 C3.34314575,18 2,16.6568542 2,15 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z M6.16794971,10.5547002 C7.67758127,12.8191475 9.64566871,14 12,14 C14.3543313,14 16.3224187,12.8191475 17.8320503,10.5547002 C18.1384028,10.0951715 18.0142289,9.47430216 17.5547002,9.16794971 C17.0951715,8.86159725 16.4743022,8.98577112 16.1679497,9.4452998 C15.0109146,11.1808525 13.6456687,12 12,12 C10.3543313,12 8.9890854,11.1808525 7.83205029,9.4452998 C7.52569784,8.98577112 6.90482849,8.86159725 6.4452998,9.16794971 C5.98577112,9.47430216 5.86159725,10.0951715 6.16794971,10.5547002 Z"
                      fill="#000000"/>
            </g>
        </svg><!--end::Svg Icon-->
    </a>
    <!--Chat Widget Icon:end-->

    <!--Chat Widget Box:start-->
    <div class="chat-widget-box custom-box-shadow-s-3 border-radius-3xl">
        <!--Chat Widget Card:start-->
        <div class="card text-center border-0 bg-white">
            <!--Chat Widget Card Header:start-->
            <div class="card-header text-start p-3 border-0 fs-7">
                سوالی دارید؟ به سرعت پاسخ بگیرید!
                <a href="javascript:void(0)" class="text-white closeChatWidgetBoxBtn">
                    <i class="fa fa-times float-end border-radius-circle"></i>
                </a>
            </div>
            <!--Chat Widget Card Header:end-->

            <!--Chat Widget Card Body:start-->
            <div class="card-body py-4 bg-white ChatBodyWrapper">
                <!--    Chat Widget Card Body Item:start-->
                <div class="chat-widget-msg mb-3 float-end chat-info border-radius-xl">
                    <p class="py-2 px-3 fs-7">
                        با پشتیبانی آنلاین برگ شاپ بهترین تجربه یک خرید و سفارش آنلاین را داشته باشید!
                    </p>
                    <div class="chat-info-details ltr py-2 px-3">
                        <div class="detail">
                            <i class="fa fa-envelope ps-1"></i>
                            <span>test@gmail.com</span>
                        </div>
                        <div class="detail">
                            <i class="fa fa-phone ps-1"></i>
                            <span>09305138848</span>
                        </div>
                        <div class="detail">
                            <i class="fab fa-whatsapp ps-1"></i>
                            <span>09305138848</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--    Chat Widget Card Body Item:end-->
                <!--    Chat Widget Card Body Item:start-->
                <div class="chat-widget-msg mb-3 customer-msg float-start">
                    <p class="py-2 px-3 border-radius-3-1-br">
                        سلام و خسته نباشید
                    </p>
                </div>
                <div class="clearfix"></div>
                <!--    Chat Widget Card Body Item:end-->

                <!--    Chat Widget Card Body Item:start-->
                <div class="chat-widget-msg mb-3 customer-msg float-start">
                    <p class="py-2 px-3 border-radius-3-1-br">
                        راجب پشتیبانی سوال داشتم!
                    </p>
                </div>
                <div class="clearfix"></div>
                <!--    Chat Widget Card Body Item:end-->

                <!--    Chat Widget Card Body Item:start-->
                <div class="chat-widget-msg mb-3 operator-msg float-end">
                    <p class="py-2 px-3 border-radius-3-1-bl">
                        در خدمتم هر سوالی دارید بپرسید.
                    </p>
                </div>
                <div class="clearfix"></div>
                <!--    Chat Widget Card Body Item:end-->
            </div>
            <!--Chat Widget Card Body:end-->

            <!--Chat Widget Card Footer:start-->
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                <span class="svg-icon svg-icon-primary svg-icon-2x sendChatToCardBodyBtn">
                    <!--begin::Svg Icon-->
                    <svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z"
                                  fill="#000000"/>
                        </g>
                    </svg><!--end::Svg Icon-->
                </span>
                <input type="text" class="form-control border-0 WriteMsgInput fs-7" placeholder="اینجا تایپ کنید ...">
                <span class="svg-icon svg-icon-primary svg-icon-2x chatSendFile">
                    <!--begin::Svg Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M12.4644661,14.5355339 L9.46446609,14.5355339 C8.91218134,14.5355339 8.46446609,14.9832492 8.46446609,15.5355339 C8.46446609,16.0878187 8.91218134,16.5355339 9.46446609,16.5355339 L12.4644661,16.5355339 L12.4644661,17.5355339 C12.4644661,18.6401034 11.5690356,19.5355339 10.4644661,19.5355339 L6.46446609,19.5355339 C5.35989659,19.5355339 4.46446609,18.6401034 4.46446609,17.5355339 L4.46446609,13.5355339 C4.46446609,12.4309644 5.35989659,11.5355339 6.46446609,11.5355339 L10.4644661,11.5355339 C11.5690356,11.5355339 12.4644661,12.4309644 12.4644661,13.5355339 L12.4644661,14.5355339 Z"
                                  fill="#000000" opacity="0.3"
                                  transform="translate(8.464466, 15.535534) rotate(-45.000000) translate(-8.464466, -15.535534) "/>
                            <path d="M11.5355339,9.46446609 L14.5355339,9.46446609 C15.0878187,9.46446609 15.5355339,9.01675084 15.5355339,8.46446609 C15.5355339,7.91218134 15.0878187,7.46446609 14.5355339,7.46446609 L11.5355339,7.46446609 L11.5355339,6.46446609 C11.5355339,5.35989659 12.4309644,4.46446609 13.5355339,4.46446609 L17.5355339,4.46446609 C18.6401034,4.46446609 19.5355339,5.35989659 19.5355339,6.46446609 L19.5355339,10.4644661 C19.5355339,11.5690356 18.6401034,12.4644661 17.5355339,12.4644661 L13.5355339,12.4644661 C12.4309644,12.4644661 11.5355339,11.5690356 11.5355339,10.4644661 L11.5355339,9.46446609 Z"
                                  fill="#000000"
                                  transform="translate(15.535534, 8.464466) rotate(-45.000000) translate(-15.535534, -8.464466) "/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
            <!--Chat Widget Card Footer:end-->

            <!--Send File To Chat Box:start-->
            <div class="send-file-to-chat-box d-none">
                <div class="send-file-to-chat-box-select-file">
                    <button class="d-block btn text-white" id="closeSendFileBoxBtn"><i
                            class="fa fa-times fa-lg pe-2"></i>بستن
                    </button>
                    <label class="border-radius-xl custom-box-shadow-s-1">
                        <i class="fa fa-file d-block fs-2 mb-3 gray-600"></i>
                        <span id="fileName" class="fs-7">برای انتخاب فایل خود کلیک کنید</span>
                        <input type="file" name="" class="form-control d-none" id="fileInputGetter">
                    </label>
                    <button class="btn btn-primary d-block mt-3 w-100 d-none" id="sendFileBtn">ارسال فایل</button>
                </div>
            </div>
            <!--Send File To Chat Box:end-->
        </div>
        <!--Chat Widget Card:end-->
    </div>
    <!--Chat Widget Box:end-->
</div>
<!--Chat Widget:end--> --}}

<!--Scroll To Top:start-->
<div class="to-top border-radius-circle text-center">
    <a href="#">
        <!--begin::Svg Icon-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
             viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M8.2928955,10.2071068 C7.90237121,9.81658249 7.90237121,9.18341751 8.2928955,8.79289322 C8.6834198,8.40236893 9.31658478,8.40236893 9.70710907,8.79289322 L15.7071091,14.7928932 C16.085688,15.1714722 16.0989336,15.7810586 15.7371564,16.1757246 L10.2371564,22.1757246 C9.86396402,22.5828436 9.23139665,22.6103465 8.82427766,22.2371541 C8.41715867,21.8639617 8.38965574,21.2313944 8.76284815,20.8242754 L13.6158645,15.5300757 L8.2928955,10.2071068 Z"
                      fill="#000000" fill-rule="nonzero"
                      transform="translate(12.000003, 15.500003) scale(-1, 1) rotate(-90.000000) translate(-12.000003, -15.500003) "/>
                <path d="M6.70710678,12.2071104 C6.31658249,12.5976347 5.68341751,12.5976347 5.29289322,12.2071104 C4.90236893,11.8165861 4.90236893,11.1834211 5.29289322,10.7928968 L11.2928932,4.79289682 C11.6714722,4.41431789 12.2810586,4.40107226 12.6757246,4.76284946 L18.6757246,10.2628495 C19.0828436,10.6360419 19.1103465,11.2686092 18.7371541,11.6757282 C18.3639617,12.0828472 17.7313944,12.1103502 17.3242754,11.7371577 L12.0300757,6.88414142 L6.70710678,12.2071104 Z"
                      fill="#000000" fill-rule="nonzero" opacity="0.3"
                      transform="translate(12.000003, 8.500003) scale(-1, 1) rotate(-360.000000) translate(-12.000003, -8.500003) "/>
            </g>
        </svg><!--end::Svg Icon-->
    </a>

</div>
<!--Scroll To Top:end-->

<!--Overlay:start-->
<div class="overlay"></div>
<!--Overlay:end-->

<!--Main Script::start-->
<script src="{{asset('user-assets/js/main.js')}}"></script>
<!--Main Script::end-->

<!--BootstrapJS:start-->
<script src="{{asset('user-assets/js/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!--BootstrapJS:end-->

<!--SwiperJS:start-->
<script src="{{asset('user-assets/js/vendors/swiper/swiper-bundle.min.js')}}"></script>
<!--SwiperJS:end-->

<!--Index JS:start Only for this page-->
<script src="{{asset('user-assets/js/index.js')}}"></script>
<!--Index JS:end Only for this page-->

<!--Jquery::start (!Only For product Page!)-->
<script src="{{asset('user-assets/js/vendors/jquery/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('user-assets/js/products.js')}}"></script>

<script src="{{asset('user-assets/js/vendors/xzoom/xzoom.min.js')}}"></script>
<!--XZoom::end-->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- <script src="{{asset('user-assets/js/vendors/sweetalert/jsdeliver.js')}}"></script> --}}

@include('sweetalert::alert')

</body>
<!--Body::end-->

</html>