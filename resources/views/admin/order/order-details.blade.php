@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">جزئیات سفارش</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="font-weight-bold mr-4">در این صفحه می توانید جزئیات سفارش را مشاهده کنید.</span>
				<!--end::Actions-->
			</div>
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Daterange-->
					<span class="text-muted font-size-base font-weight-bold mr-2">تاریخ:</span>
					<span class="text-primary font-size-base font-weight-bolder"><?php echo verta()->format('Y/m/d');?></span>
				<!--end::Daterange-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">جزئیات سفارش</h3>
                </div>
                <!--begin::Form-->
                    <div class="card-body">
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
                                            <a href="{{route('product.show',$product->id)}}" target="_blank" class="stretched-link"></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection