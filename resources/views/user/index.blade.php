@extends('user.layouts.master')

@section('content')

<!--Story Section:start-->
<div class="container mt-xxxx-large">
    <div class="story-section my-3 text-center px-5">
        <div class="row">
        </div>
    </div>
</div>
<!--Story Section:end-->

<!--Carousel::start-->
<header class="header">
    <!-- Slider:start -->
    <div class="swiper headerSlider">
        <div class="swiper-wrapper">
            @foreach ($carousel_photos->photos as $photo)
                <div class="swiper-slide">
                    <a href="javascript:;" title=""><img src="{{asset($photo->src)}}" class="img-fluid" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next bg-light border-radius-circle"></div>
        <div class="swiper-button-prev bg-light border-radius-circle"></div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Slider:end -->
</header>
<!--Carousel::end-->

<!--Main:start-->
<main class="container mt-5 category">

    <!--Porduct Discounted:start-->
    <div class="best-suggestions border-radius-2xl py-1 bg-purple">
        <!-- Slider:start -->
        <div class="swiper bestSuggestionsSlider">
            <div class="swiper-wrapper p-2">
                <div class="swiper-slide text-center d-flex flex-column justify-content-between align-items-center">
                    <img src="{{asset('user-assets/img/Amazings.png')}}" alt="" class="amazing-img">
                    <img src="{{asset('user-assets/img/category-best-1.png')}}" alt="" class="box-img d-block">
                    <a href="{{route('Product.index')}}" class="text-white d-block mt-3" title="">مشاهده همه <iclass="fa fa-angle-left align-baseline ms-1"></i></a>
                </div>
                {{-- <div class="swiper-slide border-radius-1-tr-br">
                    <img src="{{asset('user-assets/img/coat-1.jpg')}}" class="img-fluid" alt="">
                    <div class="product-details d-flex justify-content-between align-items-center mt-4">
                        <span class="discount-amount text-white px-2 border-radius-3xl fs-6 fw-bold d">25 %</span>
                        <span class="discounted_price fw-bold fs-5">269000 <span>تومان</span></span>
                    </div>
                    <del class="d-block real_price float-end gray-500 pe-4">290,000</del>
                    <a href="#" class="stretched-link" title=""></a>
                </div> --}}
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        @foreach ($product->photos as $photo)
                            <img src="{{asset($photo->src)}}" class="img-fluid" alt="">
                        @endforeach
                        <div class="product-details d-flex justify-content-between align-items-center mt-4">
                            <span class="discount-amount text-white px-2 border-radius-3xl fs-6 fw-bold">{{getpercent($product)}}%</span>
                            <span class="discounted_price fw-bold fs-5">{{priceFormatter($product->price_discounted)}}</span>
                        </div>
                        <del class="d-block real_price float-end gray-500 pe-4">{{priceFormatter($product->price)}}</del>
                        <a href="{{route('Product.show',$product->id)}}" class="stretched-link" title=""></a>
                    </div>
                @endforeach
                <div class="swiper-slide border-radius-1-tl-bl text-center">
                    <i class="fa fa-angle-left border-gray-300 text-info"></i>
                    <a href="{{route('Product.index')}}" class="stretched-link d-block text-black-50" title="">مشاهده همه</a>
                </div>
            </div>
            <div class="swiper-button-next bg-light border-radius-circle border-gray-400"></div>
            <div class="swiper-button-prev bg-light border-radius-circle border-gray-400"></div>
            <div class="swiper-pagination"></div>

        </div>
        <!-- Slider:end -->
    </div>
    <!--Porduct Discounted:End-->

    <!--Small Banners:start-->
    <div class="banners mt-4">
        <div class="row">
            @foreach ($small_banner_photos->photos as $photo)
                <div class="col-6 col-lg-3 col-xl-3 mb-3">
                    <a href="javascript:;">
                        <img src="{{asset($photo->src)}}" alt="" class="img-fluid border-radius-3xl img-opacity">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!--Small Banners:end-->

 

    <!--Med Banners:start-->
    <div class="banners my-5">
        <div class="row">
            @foreach ($medium_banner_photos->photos as $photo)
                <div class="col-6">
                    <a href="javascript:;">
                        <img src="{{asset($photo->src)}}" alt="" class="img-fluid border-radius-3xl img-opacity">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!--Med Banners:end-->

    <!--Best Brands:start-->
    <section class="best-brands border-radius-3xl border border-gray-300 mt-4 pb-4">
        <!--Section Title:start-->
        <h2 class="text-center my-4 section-title fs-4">
            محبوب ترین برندها
        </h2>
        <!--Section Title:end-->

        <!--Slider:start-->
        <div class="swiper brandsSlider">
            <div class="swiper-wrapper">
                <!--Brands Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <a href="javascript:;" title="" class="stretched-link">
                            <img src="{{asset('user-assets/img/brand-3.png')}}" alt="" title="" class="img-fluid p-3">
                        </a>
                    </div>
                </div>
                <!--Brands Item:end-->
                <!--Brands Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <a href="javascript:;" title="" class="stretched-link">
                            <img src="{{asset('user-assets/img/brand-4.png')}}" alt="" title="" class="img-fluid p-3">
                        </a>
                    </div>
                </div>
                <!--Brands Item:end-->
                <!--Brands Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <a href="javascript:;" title="" class="stretched-link">
                            <img src="{{asset('user-assets/img/brand-9.jpg')}}" alt="" title="" class="img-fluid p-3">
                        </a>
                    </div>
                </div>
                <!--Brands Item:end-->
                <!--Brands Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <a href="javascript:;" title="" class="stretched-link">
                            <img src="{{asset('user-assets/img/brand-10.png')}}" alt="" title="" class="img-fluid p-3">
                        </a>
                    </div>
                </div>
                <!--Brands Item:end-->
                <!--Brands Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <a href="javascript:;" title="" class="stretched-link">
                            <img src="{{asset('user-assets/img/brand-13.png')}}" alt="" title="" class="img-fluid p-3">
                        </a>
                    </div>
                </div>
                <!--Brands Item:end-->
            </div>
            <div class="swiper-button-next bg-light border-radius-circle"></div>
            <div class="swiper-button-prev bg-light border-radius-circle"></div>
        </div>
        <!--Slider:end-->
    </section>
    <!--Best Brands:end-->

    <!--Blog Section:start-->
    <section class="blog mt-5">
        @if (count($infos) > 0)
            <div class="d-flex justify-content-between align-items-baseline mb-3">
                <h2 class="text-center my-4 section-title fs-4">
                    تازه ترین ها :
                </h2>
            </div>
            <!--Info Items:start-->
            <div class="row">
                @foreach ($infos as $info)
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-4">
                        <div class="blog-item border-radius-2xl overflow-hidden mb-3">
                            <div class="blog-item-img">
                                @foreach ($info->photos as $photo)
                                    <img src="{{asset($photo->src)}}" alt="" title="" class="img-fluid card-img"></a>
                                @endforeach
                            </div>
                            <div class="blog-item-contents px-2 pb-3">
                                <h2 class="mt-1">
                                    <p class="fs-6 fw-bold">
                                        {{$info->title}}
                                    </p>
                                </h2>
                                <p class="fs-8">
                                    {!!$info->text!!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--Info Items:end-->
        @endif
    </section>
    <!--Blog Section:end-->

</main>
<!--Main:end-->

@endsection()