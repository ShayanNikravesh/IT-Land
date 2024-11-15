<!DOCTYPE html>
<html dir="rtl" lang="fa">
<!--Head::start-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>پرداخت</title>

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
                <a href="{{route('cart')}}" class="text-danger basket mx-3">
                    <i class="fa fa-shopping-cart rotate-3d"></i>
                    سبد خرید
                </a>
                <a href="{{route('to-shipping')}}"
                   class="text-danger basket mx-3 shipping d-flex justify-content-between align-items-center">
                    <p class="fs-6">
                        <i class="fa fa-truck rotate-3d"></i>
                        <span>زمان و نحوه ارسال</span>
                    </p>
                </a>
                <a href="{{route('payment')}}"
                   class="text-danger shipping mx-3 d-flex justify-content-between align-items-center">
                    <i class="fa fa-credit-card pe-2"></i>
                    <span>پرداخت</span>
                </a>
            </div>
            <!--Payment Timeline:end-->
        </div>
        <!--Payment Header:end-->

        <!--Payment Details:start-->
        <div class="payment-details cart">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <!--Payment Method:start-->
                    <div class="payment-methods border border-radius-xl p-3 mb-3">
                        <h2 class="fs-5 fw-bold">روش پرداخت :</h2>
                        <div class="payment-methods mt-4">
                            <form action="">
                                <div class="mb-4 border-bottom-gray-150 pb-3">
                                    <input class="" type="radio" id="wallet" checked>
                                    <label class="fw-bold" for="wallet">
                                        <i class="fa fa-wallet fs-3 px-2 gray-500"></i>
                                        Zarinpal
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Payment Method:end-->
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
                                {{priceFormatter(session()->get('amount_payable'))}}
                            </p>
                        </div>
                        <!--All Prices Discounted:end-->

                        <!--Purchase:start-->
                        <div class="purchase-profit d-flex justify-content-between align-items-center px-3 border-bottom-gray-300 py-3">
                            <p class="fs-7 fw-bold text-danger">
                                سود شما از خرید
                            </p>
                            <p class="fs-6 fw-bold text-danger">
                                {{priceFormatter(Profit())}}
                            </p>
                        </div>
                        <!--Purchase:end-->

                        <!--Checkout Btn:start-->
                            <div class="d-grid gap-2 p-3">
                                <a href="{{route('payment-request')}}" class="btn custom-btn-danger border-radius-xl">پرداخت</a>
                            </div>  
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

{{-- <!--Main Script::start-->
<script src="{{asset('user-assets/js/main.js')}}"></script>
<!--Main Script::end--> --}}

<!--BootstrapJS:start-->
<script src="{{asset('user-assets/js/vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!--BootstrapJS:end-->

<!--SwiperJS:start-->
<script src="{{asset('user-assets/js/vendors/swiper/swiper-bundle.min.js')}}"></script>
<!--SwiperJS:end-->

</body>
<!--Body::end-->

</html>