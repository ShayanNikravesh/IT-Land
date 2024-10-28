@extends('user.layouts.master')

@section('content')

<!--User Panel:start-->
<main class="mt-xxxx-large">
    <!--User Panel Wrapper:start-->
    <div class="user-panel-wrapper">
        <div class="container">
            <div class="row">
                
                <!--user aside::start -->
                @include('user.layouts.user-aside')
                <!--user aside::end -->

                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">
                    <!--User Panel Content:start-->
                    <div class="user-panel-content">

                        <!--Verify Identity:start-->
                        <div class="user-panel-verify-identity border border-radius-xl p-3 d-flex justify-content-between align-items-center mb-3 mt-3">
                            <p class="fs-7 text-dark">
                                <i class="fa fa-smile text-dark align-middle pe-1"></i>
                                به فروشگاهی اینترنتی آیتی لند خوش آمدید.
                            </p>
                        </div>
                        <!--Verify Identity:end-->

                        <!--User Panel Status:start-->
                        <div class="user-panel-status mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-7 col-xl-8 mb-3">
                                    <!--My Wallet:start-->
                                    <div class="user-panel-wallet p-4">
                                        <p class="gray-600 mb-2">موجودی کیف پول</p>
                                        <h4 class="text-white fs-2">300,000 تومان</h4>
                                        <p class="gray-600 mb-1">آخرین شارژ حساب در 1401/3/21</p>
                                        <h5 class="text-white">20,000 تومان</h5>
                                        <a class="btn mt-4 py-3 px-5">شارژ کیف پول
                                            <i class="fa fa-plus ps-2"></i>
                                        </a>
                                    </div>
                                    <!--                        My Wallet:end-->
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-4">
                                    <!--                        My Current Status:start-->
                                    <div class="user-panel-current-status h-100">
                                        <div class="d-flex flex-column justify-content-between h-100">
                                            <!--                                           User All Buy:start-->
                                            <div class="user-all-buys p-3 mb-3">
                                                <div class=" d-flex justify-content-start align-items-center">
                                                    <span class="border-radius-circle d-flex justify-content-center align-items-center">
                                                    <i class="fa fa-dollar-sign text-white"></i>
                                                </span>
                                                    <div class="ms-3">
                                                        <p class="fs-7 gray-150">مبلغ کل سفارشات</p>
                                                        <p class="fs-5">135,789 تومان</p>

                                                    </div>
                                                </div>
                                                <a href="" class="text-white fs-8 mt-4 d-block">مشاهده تاریخچه سفارشات
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </div>
                                            <!--                                           User All Buy:end-->

                                            <!--                                           User All Club Points:start-->
                                            <div class="user-all-club-points p-3 mb-3">
                                                <div class=" d-flex justify-content-start align-items-center">
                                                    <span class="border-radius-circle d-flex justify-content-center align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                             viewBox="0 0 48 48">
                                                            <g id="Group_25000" data-name="Group 25000"
                                                               transform="translate(-926 -614)">
                                                            <rect id="Rectangle_18646" data-name="Rectangle 18646"
                                                                  width="48" height="48"
                                                                  rx="24" transform="translate(926 614)"
                                                                  fill="rgba(255,255,255,0.5)"></rect>
                                                            <g id="Group_24786" data-name="Group 24786"
                                                               transform="translate(701.466 93)">
                                                                <path id="Path_2961" data-name="Path 2961"
                                                                      d="M221.069,0a8,8,0,1,0,8,8,8,8,0,0,0-8-8m0,15a7,7,0,1,1,7-7,7,7,0,0,1-7,7"
                                                                      transform="translate(27.466 537)"
                                                                      fill="#fff"></path>
                                                                <path id="Union_11" data-name="Union 11"
                                                                      d="M16425.393,420.226l-3.777-5.039a.42.42,0,0,1-.012-.482l1.662-2.515a.416.416,0,0,1,.313-.186l0,0h4.26a.41.41,0,0,1,.346.19l1.674,2.515a.414.414,0,0,1-.012.482l-3.777,5.039a.413.413,0,0,1-.338.169A.419.419,0,0,1,16425.393,420.226Zm-2.775-5.245,3.113,4.148,3.109-4.148-1.32-1.983h-3.592Z"
                                                                      transform="translate(-16177.195 129)"
                                                                      fill="#fff"></path>
                                                            </g>
                                                            </g>
                                                        </svg>
                                                     </span>
                                                    <div class="ms-3">
                                                        <p class="fs-7 gray-150">تمام امتیاز های کلاب</p>
                                                        <p class="fs-5">10821</p>

                                                    </div>
                                                </div>
                                                <a href="" class="text-white fs-8 mt-4 d-block">تبدیل امتیاز های کلاب
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </div>
                                            <!--                                           User All Club Points:end-->
                                        </div>
                                    </div>
                                    <!--                        My Current Status:end-->
                                </div>
                            </div>
                        </div>
                        <!--User Panel Status:end-->

                        <!--User Panel State:start-->
                        <div class="user-panel-state">
                            <div class="row">
                                <!--                                User Panel Info:start-->
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                    <div class="wrapper h-100">
                                        <!--                                        User Panel State Top:start-->
                                        <div class="user-panel-state-left p-3 border-bottom-gray-300">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                     viewBox="0 0 48 48">
                                                    <g id="Group_25000" data-name="Group 25000"
                                                       transform="translate(-1367 -427)">
                                                        <path id="Path_32314" data-name="Path 32314"
                                                              d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                                                              transform="translate(1367 427)" fill="#d43533"></path>
                                                        <g id="Group_24770" data-name="Group 24770"
                                                           transform="translate(1382.999 443)">
                                                            <path id="Path_25692" data-name="Path 25692"
                                                                  d="M294.507,424.89a2,2,0,1,0,2,2A2,2,0,0,0,294.507,424.89Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,294.507,427.89Z"
                                                                  transform="translate(-289.508 -412.89)"
                                                                  fill="#fff"></path>
                                                            <path id="Path_25693" data-name="Path 25693"
                                                                  d="M302.507,424.89a2,2,0,1,0,2,2A2,2,0,0,0,302.507,424.89Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,302.507,427.89Z"
                                                                  transform="translate(-289.508 -412.89)"
                                                                  fill="#fff"></path>
                                                            <g id="LWPOLYLINE">
                                                                <path id="Path_25694" data-name="Path 25694"
                                                                      d="M305.43,416.864a1.5,1.5,0,0,0-1.423-1.974h-9a.5.5,0,0,0,0,1h9a.467.467,0,0,1,.129.017.5.5,0,0,1,.354.611l-1.581,6a.5.5,0,0,1-.483.372h-7.462a.5.5,0,0,1-.489-.392l-1.871-8.433a1.5,1.5,0,0,0-1.465-1.175h-1.131a.5.5,0,1,0,0,1h1.043a.5.5,0,0,1,.489.391l1.871,8.434a1.5,1.5,0,0,0,1.465,1.175h7.55a1.5,1.5,0,0,0,1.423-1.026Z"
                                                                      transform="translate(-289.508 -412.89)"
                                                                      fill="#fff"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="ms-3">
                                                    <h4 class="fw-bolder">10</h4>
                                                    <p class="fs-7 gray-500">محصول در سبد خرید</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                        User Panel State Top:end-->

                                        <!--                                        User Panel State Middle:start-->
                                        <div class="user-panel-state-middle p-3 border-bottom-gray-300">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                     viewBox="0 0 48 48">
                                                    <g id="Group_25000" data-name="Group 25000"
                                                       transform="translate(-1367 -499)">
                                                        <path id="Path_32309" data-name="Path 32309"
                                                              d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                                                              transform="translate(1367 499)" fill="#3490f3"></path>
                                                        <g id="Group_24772" data-name="Group 24772"
                                                           transform="translate(1383 515)">
                                                            <g id="Wooden" transform="translate(0 1)">
                                                                <path id="Path_25676" data-name="Path 25676"
                                                                      d="M290.82,413.6a4.5,4.5,0,0,0-6.364,0l-.318.318-.318-.318a4.5,4.5,0,1,0-6.364,6.364l6.046,6.054a.9.9,0,0,0,1.272,0l6.046-6.054A4.5,4.5,0,0,0,290.82,413.6Zm-.707,5.657-5.975,5.984-5.975-5.984a3.5,3.5,0,1,1,4.95-4.95l.389.389a.9.9,0,0,0,1.272,0l.389-.389a3.5,3.5,0,1,1,4.95,4.95Z"
                                                                      transform="translate(-276.138 -412.286)"
                                                                      fill="#fff"></path>
                                                            </g>
                                                            <rect id="Rectangle_1603" data-name="Rectangle 1603"
                                                                  width="16" height="16" transform="translate(0)"
                                                                  fill="none"></rect>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="ms-3">
                                                    <h4 class="fw-bolder">12</h4>
                                                    <p class="fs-7 gray-500">محصول در علاقه مندی</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                        User Panel State Middle:end-->

                                        <!--                                        User Panel State Bottom:start-->
                                        <div class="user-panel-state-middle p-3 border-bottom-gray-300">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                                     viewBox="0 0 48 48">
                                                    <g id="Group_25000" data-name="Group 25000"
                                                       transform="translate(-1367 -576)">
                                                        <path id="Path_32315" data-name="Path 32315"
                                                              d="M24,0A24,24,0,1,1,0,24,24,24,0,0,1,24,0Z"
                                                              transform="translate(1367 576)" fill="#85b567"></path>
                                                        <path id="_2e746ddacacf202af82cf4480bae6173"
                                                              data-name="2e746ddacacf202af82cf4480bae6173"
                                                              d="M11.483,3h-.009a.308.308,0,0,0-.1.026L4.26,6.068A.308.308,0,0,0,4,6.376V15.6a.308.308,0,0,0,.026.127v0l.009.017a.308.308,0,0,0,.157.147l7.116,3.042a.338.338,0,0,0,.382,0L18.8,15.9a.308.308,0,0,0,.189-.243q0-.008,0-.017s0-.01,0-.015,0-.01,0-.015,0,0,0,0V6.376a.308.308,0,0,0-.255-.306L11.632,3.031l-.007,0a.308.308,0,0,0-.05-.017l-.009,0-.022,0h-.062Zm.014.643L13,4.287,6.614,7.02,6.6,7.029,5.088,6.383,11.5,3.643Zm2.29.979,1.829.782L9.108,8.188a.414.414,0,0,0-.186.349v3.291l-.667-1a.308.308,0,0,0-.393-.1l-.786.392V7.493l6.712-2.87ZM16.4,5.738l1.509.645L11.5,9.124,9.99,8.48l6.39-2.733.018-.009ZM4.615,6.85l1.846.789v3.975a.308.308,0,0,0,.445.275l.987-.494,1.064,1.595v0a.308.308,0,0,0,.155.14h0l.027.009a.308.308,0,0,0,.057.012h.036l.036,0,.025,0,.018,0,.015,0a.308.308,0,0,0,.05-.022h0a.308.308,0,0,0,.156-.309V8.955l1.654.707v8.56L4.615,15.411Zm13.765,0v8.56L11.8,18.223V9.662Z"
                                                              transform="translate(1379.5 588.5)" fill="#fff"
                                                              stroke="#fff" stroke-width="0.25"
                                                              fill-rule="evenodd"></path>
                                                    </g>
                                                </svg>
                                                <div class="ms-3">
                                                    <h4 class="fw-bolder">21</h4>
                                                    <p class="fs-7 gray-500">تمام سفارشات</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                        User Panel State Bottom:end-->
                                    </div>
                                </div>
                                <!--                                User Panel Info:end-->

                                <!--                                User Panel Plans:start-->
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                    <div class="wrapper p-3 h-100">
                                        <p class="fw-bold">پلن های خریداری شده</p>
                                        <img src="assets/img/clown.png" alt="" class="d-block my-3">
                                        <p class="text-danger fw-bold">پکیج فعال : حرفه ای</p>
                                        <p class="fw-bold mt-2">فعال تا : 21 فروردین 1401</p>
                                        <div class="d-grid gap-2 mt-4">
                                            <a href="" class="btn btn-danger">ارتقای پلن</a>
                                        </div>
                                    </div>
                                </div>
                                <!--                                User Panel Plans:end-->

                                <!--                                User Panel Default Address:start-->
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                    <div class="wrapper p-3 h-100">
                                        <p class="fw-bold">آدرس پیش فرض حمل و نقل</p>
                                        <p class="mb-2">
                                            ایران ، خراسان رضوی
                                        </p>
                                        <p class="mb-2">
                                            سبزوار - منطقه 3
                                        </p>
                                        <p class="mb-2">
                                            فلکه نقابشک - بلوار آزادگان
                                        </p>
                                        <p class="mb-2">
                                            آزادگان 19 - کوچه شهید امیری
                                        </p>
                                        <p class="mb-2">
                                            پلاک 92
                                        </p>
                                        <div class="d-grid gap-2 mt-4">
                                            <a href="" class="btn btn-secondary bg-gray-800 ">
                                                <i class="fa fa-plus"></i>
                                                افزودن آدرس جدید
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--                                User Panel Default Address:end-->
                            </div>
                        </div>
                        <!--User Panel State:end-->

                        <!--My Wish List:start-->
                        <div class="user-panel-wish-list mt-3">
                            <!--                            Wish List Header:start-->
                            <div class="wish-list-header d-flex justify-content-between align-items-center">
                                <p class="fw-bold">لیست علاقه مندی من</p>
                                <a href="" class="text-info fs-7">مشاهده همه</a>
                            </div>
                            <!--                            Wish List Header:end-->

                            <!--                            Wish List Items:start-->
                            <div class="wish-list-items mt-3">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 col-xl-4 mb-3">
                                        <!--                                Wish List Item:start-->
                                        <div class="product-item-s2 p-3 position-relative">
                                            <!--                                    Product Item Image:start-->
                                            <div class="product-item-s2-img text-center mb-3 position-relative">
                                                <img src="assets/img/laptop-1.jpg" alt="" class="object-contain">
                                                <!--                                                Delete Product From Wish List:start-->
                                                <div class="product-item-s2-delete position-absolute">
                                                    <a href="" class="d-flex justify-content-center align-items-center"
                                                       title="حذف از لیست علاقه مندی"><i
                                                            class="fa fa-trash-alt"></i></a>
                                                </div>
                                                <!--                                                Delete Product From Wish List:end-->

                                                <!--                                                Add Product To Shopping Cart:start-->
                                                <div class="product-item-s2-add-to-cart">
                                                    <a href="" class="btn btn-sm w-100">افزودن به سبد خرید</a>
                                                </div>
                                                <!--                                                Add Product To Shopping Cart:end-->
                                            </div>
                                            <!--                                    Product Item Image:end-->

                                            <!--                                    Product Item Name:start-->
                                            <div class="product-item-s2-name">
                                                <h5 class="fs-7">
                                                    لپ تاپ ایسوس مدل هیرو سون
                                                </h5>
                                            </div>
                                            <!--                                    Product Item Name:end-->

                                            <!--                                            Product Item Price:start-->
                                            <div class="product-item-s2-price d-flex justify-content-between align-items-center mt-3">
                                                <p class="text-danger">79,000 تومان</p>
                                                <del class="fs-7">99,000 تومان</del>
                                            </div>
                                            <!--                                            Product Item Price:start-->

                                            <a href="" class="stretched-link"></a>
                                        </div>
                                        <!--                                Wish List Item:end-->
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-xl-4 mb-3">
                                        <!--                                Wish List Item:start-->
                                        <div class="product-item-s2 p-3 position-relative">
                                            <!--                                    Product Item Image:start-->
                                            <div class="product-item-s2-img text-center mb-3 position-relative">
                                                <img src="assets/img/laptop-2.jpg" alt="" class="object-contain">
                                                <!--                                                Delete Product From Wish List:start-->
                                                <div class="product-item-s2-delete position-absolute">
                                                    <a href="" class="d-flex justify-content-center align-items-center"
                                                       title="حذف از لیست علاقه مندی"><i
                                                            class="fa fa-trash-alt"></i></a>
                                                </div>
                                                <!--                                                Delete Product From Wish List:end-->

                                                <!--                                                Add Product To Shopping Cart:start-->
                                                <div class="product-item-s2-add-to-cart">
                                                    <a href="" class="btn btn-sm w-100">افزودن به سبد خرید</a>
                                                </div>
                                                <!--                                                Add Product To Shopping Cart:end-->
                                            </div>
                                            <!--                                    Product Item Image:end-->

                                            <!--                                    Product Item Name:start-->
                                            <div class="product-item-s2-name">
                                                <h5 class="fs-7">
                                                    لپ تاپ ایسوس مدل هیرو سون
                                                </h5>
                                            </div>
                                            <!--                                    Product Item Name:end-->

                                            <!--                                            Product Item Price:start-->
                                            <div class="product-item-s2-price d-flex justify-content-between align-items-center mt-3">
                                                <p class="text-danger">79,000 تومان</p>
                                                <del class="fs-7">99,000 تومان</del>
                                            </div>
                                            <!--                                            Product Item Price:start-->

                                            <a href="" class="stretched-link"></a>
                                        </div>
                                        <!--                                Wish List Item:end-->

                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-xl-4 mb-3">
                                        <!--                                Wish List Item:start-->
                                        <div class="product-item-s2 p-3 position-relative">
                                            <!--                                    Product Item Image:start-->
                                            <div class="product-item-s2-img text-center mb-3 position-relative">
                                                <img src="assets/img/laptop-3.jpg" alt="" class="object-contain">
                                                <!--                                                Delete Product From Wish List:start-->
                                                <div class="product-item-s2-delete position-absolute">
                                                    <a href="" class="d-flex justify-content-center align-items-center"
                                                       title="حذف از لیست علاقه مندی"><i
                                                            class="fa fa-trash-alt"></i></a>
                                                </div>
                                                <!--                                                Delete Product From Wish List:end-->

                                                <!--                                                Add Product To Shopping Cart:start-->
                                                <div class="product-item-s2-add-to-cart">
                                                    <a href="" class="btn btn-sm w-100">افزودن به سبد خرید</a>
                                                </div>
                                                <!--                                                Add Product To Shopping Cart:end-->
                                            </div>
                                            <!--                                    Product Item Image:end-->

                                            <!--                                    Product Item Name:start-->
                                            <div class="product-item-s2-name">
                                                <h5 class="fs-7">
                                                    لپ تاپ ایسوس مدل هیرو سون
                                                </h5>
                                            </div>
                                            <!--                                    Product Item Name:end-->

                                            <!--                                            Product Item Price:start-->
                                            <div class="product-item-s2-price d-flex justify-content-between align-items-center mt-3">
                                                <p class="text-danger">79,000 تومان</p>
                                                <del class="fs-7">99,000 تومان</del>
                                            </div>
                                            <!--                                            Product Item Price:start-->

                                            <a href="" class="stretched-link"></a>
                                        </div>
                                        <!--                                Wish List Item:end-->

                                    </div>
                                </div>

                            </div>
                            <!--                            Wish List Items:end-->
                        </div>
                        <!--My Wish List:end-->
                    </div>
                    <!--User Panel Content:end-->
                </div>
            </div>
        </div>
    </div>
    <!--User Panel Wrapper:end-->
</main>
<!--User Panel:end-->

@endsection()