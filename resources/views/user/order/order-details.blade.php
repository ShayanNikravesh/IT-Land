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

                        <!--User Panel Order Detail:start-->
                        <div class="user-panel-order-detail border border-radius-xl mb-3 mt-3">

                            <!--User Panel Order Detail Header:start-->
                            <div class="user-panel-order-detail-header p-3 border-bottom-gray-300 d-flex justify-content-between align-items-center">
                                <p class="fw-bold">
                                    <a href="{{route('show-orders')}}">
                                        <i class="fa fa-arrow-right align-middle pe-2"></i>
                                    </a>
                                    جزئیات سفارش
                                </p>
                            </div>
                            <!--User Panel Order Detail Header:end-->

                            <!--User Panel Order Detail Content:start-->
                            <div class="user-panel-order-detail-content p-3">
                                <p class="gray-600 border-bottom-gray-150 pb-3 fw-lighter">
                                    کد پیگیری سفارش :
                                    <span class="fw-bold">{{$order->tracking_code}}</span>
                                    <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                    تاریخ ثبت سفارش :
                                    <span class="fw-bold"><?php echo verta($order->created_at)->format('Y/m/d');?></span>
                                </p>
                                <p class="gray-600 border-bottom-gray-150 py-3 fw-lighter">
                                    تحویل گیرنده :
                                    <span class="fw-bold">{{$address->first_name.' '.$address->last_name}}</span>
                                    <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                    شماره موبایل :
                                    <span class="fw-bold">{{$address->mobile}}</span>
                                    <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                    آدرس :
                                    <span class="fw-bold">{{getcity($address->city_id).'،'.$address->address}}</span>
                                </p>
                                <p class="gray-600 border-bottom-gray-150 py-3 fw-lighter">
                                    مبلغ :
                                    <span class="fw-bold">{{priceFormatter($order->amount_payable)}}</span>
                                    <i class="fa fa-circle fs-11 gray-300 px-2"></i>
                                    هزینه ارسال :
                                    <span class="fw-bold">{{priceFormatter($order->submit_cost)}}</span>
                                </p>
                                {{-- <p class="gray-600 border-bottom-gray-150 py-3 fw-lighter">
                                    تاریخ ثبت :
                                    <span class="fw-bold"></span>

                                </p> --}}
                                <div class="ordered-products">
                                    <p class="gray-600 py-3 fw-lighter">
                                        محصولات خریداری شده در این سفارش :
                                    </p>
                                    <div class="row">
                                        @foreach ($order->products as $product)
                                            <div class="col-4 col-md-2 p-4">
                                                <div class="ordered-product-item position-relative">
                                                    @if (count($product->photos) > 0)
                                                        @foreach ($product->photos as $photo)
                                                            <img src="{{asset($photo->src)}}" alt="image" class="object-contain img-fluid">
                                                        @endforeach
                                                    @else
                                                        <img src="{{asset('user-assets/img/box.png')}}" alt="image" class="object-contain img-fluid">    
                                                    @endif
                                                    <span class="badge bg-gray-200 position-absolute top-0">{{$product->pivot->quantity}}</span>
                                                    <a href="{{route('Product.show',$product->id)}}" target="_blank" class="stretched-link"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--User Panel Order Detail Content:end-->
                        </div>
                        <!--User Panel Order Detail:end-->
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