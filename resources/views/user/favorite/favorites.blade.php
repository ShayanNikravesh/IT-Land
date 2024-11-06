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

                        <!--My Wish List:start-->
                        <div class="user-panel-wish-list mt-3">
                            <!--Wish List Header:start-->
                            <div class="wish-list-header d-flex justify-content-between align-items-center">
                                <p class="fw-bold">لیست علاقه مندی ها</p>
                            </div>
                            <!--Wish List Header:end-->
                            @if (count($favorites) > 0)
                                @foreach ($favorites as $favorite)
                                    <!--Wish List Items:start-->
                                    <div class="wish-list-items mt-3">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-xl-4 mb-3">
                                                <!--Wish List Item:start-->
                                                <div class="product-item-s2 p-3 position-relative">
                                                    <!--Product Item Image:start-->
                                                    <div class="product-item-s2-img text-center mb-3 position-relative">
                                                        @if (count($favorite->product->photos) > 0)
                                                            @foreach ($favorite->product->photos as $photo)
                                                                <img src="{{asset($photo->src)}}" alt="image" class="object-contain">
                                                            @endforeach
                                                        @else
                                                            <img src="{{asset('user-assets/img/box.png')}}" alt="image" class="object-contain">    
                                                        @endif
                                                        <!--Delete Product From Wish List:start-->
                                                        <div class="product-item-s2-delete position-absolute">
                                                            <a href="{{route('delete-favorite',$favorite->product->id)}}" class="d-flex justify-content-center align-items-center" title="حذف از لیست علاقه مندی"><i class="fa fa-trash-alt"></i></a>
                                                        </div>
                                                        <!--Delete Product From Wish List:end-->
                                                        {{-- @if ($favorite->product->has_color == 0)
                                                            <!--Add Product To Shopping Cart:start-->
                                                            <div class="product-item-s2-add-to-cart">
                                                                <a href="{{route('add_to_cart',['product_id' => $favorite->product->id, 'color_id' => 0])}}" class="btn btn-sm w-100">افزودن به سبد خرید</a>
                                                            </div>
                                                            <!--Add Product To Shopping Cart:end-->
                                                        @endif --}}
                                                    </div>
                                                    <!--Product Item Image:end-->

                                                    <!--Product Item Name:start-->
                                                    <div class="product-item-s2-name">
                                                        <h5 class="fs-7">
                                                            {{$favorite->product->title}}
                                                        </h5>
                                                    </div>
                                                    <!--Product Item Name:end-->

                                                    <!--Product Item Price:start-->
                                                    @if ($favorite->product->has_color == 0)
                                                        <div class="product-item-s2-price d-flex justify-content-between align-items-center mt-3">
                                                            @if ($favorite->product->price_discounted > 0)
                                                                <p class="text-danger">{{priceFormatter($favorite->product->price_discounted)}}</p>
                                                                <del class="fs-7">{{priceFormatter($favorite->product->price)}}</del>
                                                            @else
                                                                <p>{{priceFormatter($favorite->product->price_discounted)}}</p> 
                                                            @endif
                                                        </div>
                                                    @endif
                                                    <!--Product Item Price:start-->

                                                    <a href="{{route('Product.show',$favorite->product->id)}}" target="_blank" class="stretched-link"></a>
                                                </div>
                                                <!--Wish List Item:end-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--Wish List Items:end-->
                                @endforeach
                            @else
                                <div class="text-center my-5">
                                    <img src="{{asset('user-assets/img/favorites-list-empty.svg')}}" alt="">
                                    <p class="fs-8">لیست علاقه مندی های شما خالی است.</p>
                                </div>
                            @endif
                            
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