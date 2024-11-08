<!DOCTYPE html>
<html dir="rtl" lang="fa">
<!--Head::start-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>ارسال</title>

    <!--    Bootstrap 5 RTL-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/bootstrap/bootstrap.rtl.css')}}">
    <!--    Fontawesome 5-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/fontawesome/fontawesome.min.css')}}">
    <!--    SwiperJs Styles-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/swiper/swiper-bundle.min.css')}}">
    <!--    Main Styles-->
    <link rel="stylesheet" href="{{asset('user-assets/css/style.css')}}">
</head>
<!--Head::end-->

<!--Body::start-->
<body>
<!--Main:start-->
<main class="container">
    <div class="payment">
        <!--Payment Header:start-->
        <div class="payment-header border-radius-xl my-3">
            <!--Payment Header Logo:start-->
            <a href=""><img src="{{asset('user-assets/img/logo.png')}}" alt="" class="payment-img d-block mx-auto my-3"></a>
            <!--Payment Header Logo:end-->

            <!--Payment Timeline:start-->
            <div class="payment-timeline d-flex justify-content-center align-items-baseline my-3">
                <a href="cart.html" class="text-danger basket mx-3">
                    <i class="fa fa-shopping-cart rotate-3d"></i>
                    سبد خرید
                </a>
                <a href="shipping.html"
                   class="text-danger mx-3 shipping d-flex justify-content-between align-items-center">
                    <p class="fs-5">
                        <i class="fa fa-truck rotate-3d"></i>
                        <span>ارسال</span>
                    </p>
                </a>
                <span class="text-secondary mx-3 pay d-flex justify-content-between align-items-center">
                    <i class="fa fa-credit-card pe-2"></i>
                    <span>پرداخت</span>
                </span>
            </div>
            <!--Payment Timeline:end-->
        </div>
        <!--Payment Header:end-->

        <!--Payment Details:start-->
        <div class="payment-details cart">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <!--Payment Address:start-->
                    @if(empty($default_address))
                        <a href="{{route('Address.index')}}">شما آدرس پیش فرضی ندارید برای ادامه خرید آدرسی ثبت کنید.</a>
                    @else
                        <div class="payment-address d-flex justify-content-between align-items-center border border-radius-xl p-3">
                            <div class="address-details">
                                <span class="fs-8">آدرس تحویل سفارش :</span>
                                <p class="fw-bold my-2">
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{$default_address->city->name.'،'.$default_address->address}}
                                </p>
                                <span class="fs-7">{{$default_address->first_name.' '.$default_address->last_name}}</span>
                            </div>
                            <a href="{{route('Address.index')}}" class="text-info fs-7">
                                تغییر | ویرایش
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </div>
                    @endif
                    <!--Payment Address:end-->

                    <!--Payment Transfer Time:start-->
                    <div class="payment-transfer-time border border-radius-xl mt-3 p-3">
                        <div class="d-flex justify-content-start align-items-center">
                            <i class="fa fa-truck rotate-3d text-danger fs-4"></i>
                            <div class="ms-3">
                                <span class="fw-bold">
                                    <span class="badge bg-gray-500 border-radius-xl">{{$totalQuantity}} کالا</span>
                                </span>
                            </div>
                        </div>
                        <!--Payment Products:start-->
                        <div class="payment-products mt-4">
                            <div class="row">
                                @foreach ($cart_products as $product)
                                    <!--Payment Product Item:start-->
                                    <div class="col-3 col-xl-2">
                                        <!--Payment Product Image:start-->
                                        <div class="payment-products-image position-relative">
                                            <img src="{{asset($product->attributes->photo)}}" alt="" class="object-contain">
                                            <p class="badge bg-gray-400 position-absolute bottom-0">{{$product->quantity}}</p>
                                        </div>
                                        <!--Payment Product Image:end-->
                                    </div>
                                    <!--Payment Product Item:end-->
                                @endforeach
                            </div>
                        </div>
                        <!--Payment Products:end-->
                    </div>
                    <!--Payment Transfer Time:end-->
                    <a href="{{route('cart')}}" class="text-info mt-3 d-block fs-7">بازگشت به سبد خرید</a>

                </div>

                <!--Products Prices:start-->
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-3">
                    <div class="cart-cal border border-radius-xl overflow-hidden">
                        <!--All Prices:start-->
                        <div class="all-price d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                            <p class="fs-7 fw-bold">
                                قیمت کالاها
                                <span>({{$totalQuantity}})</span>
                            </p>
                            <p class="fs-7 gray-600 fw-bold">
                                {{priceFormatter($total)}}
                            </p>
                        </div>
                        <!--All Prices:end-->

                        <!--All Prices Discounted:start-->
                        <div class="all-price-discounted d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                            <p class="fs-7 fw-bold">
                                جمع سبد خرید
                            </p>
                            <p class="fs-7 gray-600 fw-bold">
                                {{priceFormatter($total)}}
                            </p>
                        </div>
                        <!--All Prices Discounted:end-->

                        <!--Purchase:start-->
                        <div class="purchase-profit d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                            <p class="fs-7 fw-bold text-danger">
                                سود شما از خرید
                            </p>
                            <p class="fs-6 fw-bold text-danger">
                                0
                            </p>
                        </div>
                        <!--Purchase:end-->

                        <!--Checkout Btn:start-->
                        @if(empty($default_address))
                            <div class="d-grid gap-2 p-3">
                                <a href="{{route('Address.index')}}" class="btn btn-warning border-radius-xl">آدرس پیش فرض ندارید</a>
                            </div> 
                        @else
                            <div class="d-grid gap-2 p-3">
                                <a href="" class="btn custom-btn-danger border-radius-xl">رفتن به مرحله بعد</a>
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
        </div>
        <!--Payment Details:end-->
    </div>
</main>
<!--Main:end-->


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

</body>
<!--Body::end-->

</html>