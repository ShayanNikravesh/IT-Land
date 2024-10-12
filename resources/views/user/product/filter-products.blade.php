@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="container mt-xxxx-large">

    <div class="category-products my-3">
        <p>محصولات مربط با جست و جوی شما :</p>
    </div>

    <!--Search:start-->
    <div class="search">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-3">
                <!--Search Filters:start-->
                 @include('user.layouts.filter')
                <!--Search Filters:end-->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <!--Products:start-->
                <div class="products">
                    <!--Product Ordering:start-->
                    <div class="d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2 product-ordering">
                        <div>
                            <p class="d-inline fs-7">
                                <i class="fa fa-sort-amount-down pe-1"></i>
                                مرتب سازی:
                            </p>
                            <a href="" class="fs-8 gray-600 mx-1">جدیدترین</a>
                            <a href="" class="fs-8 gray-600 mx-1">قدیمی ترین</a>
                            <a href="" class="fs-8 gray-600 mx-1">ارزان ترین</a>
                            <a href="" class="fs-8 gray-600 mx-1">گران ترین</a>
                        </div>
                        <p class="count-of-comments">
                            تعداد کالا : {{count($products)}}
                        </p>
                    </div>
                    <!--Product Ordering:end-->
                    <div class="row">
                        @foreach ($products as $product)
                            <!--Product Item:start-->
                            <div class="product-item col-sm-12 col-md-6 col-lg-4 col-xl-3 position-relative">
                                <!--Product Colors:start-->
                                <div class="product-item-color">
                                    @if ($product->has_color == 1)
                                        @foreach ($product->colors as $product_color)
                                            <span class="badge border-radius-circle fs-10" style="background-color: {{$product_color->code}};">&nbsp;</span>
                                        @endforeach
                                    @endif
                                    <span class="badge border-radius-circle fs-11">&nbsp;</span>
                                </div>
                                <!--Product Colors:end-->

                                <!--Product Item Image:start-->
                                <div class="product-item-img">
                                    @foreach ($product->photos as $photo)
                                        <img src="{{asset($photo->src)}}" alt="img" class="img-fluid">
                                    @endforeach
                                </div>
                                <!--Product Item Image:end-->

                                <!--Product Item Desc:start-->
                                <div class="product-item-title">
                                    <h3 class="fs-7 fw-bold">{{$product->title}}</h3>
                                </div>
                                <h3 class="gray-400 en-title d-block pb-1 fs-7">{{$product->english_title}}</h3>
                                <!--Product Item Desc:end-->

                                @if ($product->has_color == 0)
                                    <!--Product Item Price:start-->
                                    <div class="product-item-price text-end my-3">
                                        <p class="fw-bold">
                                            {{priceFormatter($product->price)}}
                                        </p>
                                    </div>
                                    <!--Product Item Price:end-->
                                @endif

                                <!--Product Link:start-->
                                <a target="_blank" href="{{route('Product.show',$product->id)}}" class="stretched-link"></a>
                                <!--Product Link:end-->
                            </div>
                            <!--Product Item:end-->
                        @endforeach
                    </div>
                </div>
                <!--Products:end-->
                <!--Pagination:start-->
                <nav class="mt-3 d-flex justify-content-center align-items-center">
                    {{ $products->links('vendor.pagination.bootstrap-5') }}
                </nav>
                <!--Pagination:end-->
            </div>
        </div>
    </div>
    <!--Search:end-->
</main>
<!--Main:end-->

@endsection()