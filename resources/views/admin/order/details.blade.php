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
            <!--begin::Page Layout-->
            <div class="d-flex flex-row">
                <!--begin::Layout-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-body p-0">
                            <!-- begin: Invoice-->
                            <!-- begin: Invoice header-->
                            <div class="row justify-content-center py-8 px-8 py-md-27 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                                        <h1 class="display-4 font-weight-boldest mb-10">جزئیات سفارش</h1>
                                        <div class="d-flex flex-column align-items-md-end px-0">
                                            <!--begin::Logo-->
                                            <a href="javascript:;" class="mb-5">
                                                <img src="{{asset('admin-assets/media/logos/logo-letter.png')}}" alt="" />
                                            </a>
                                            <!--end::Logo-->
                                        </div>
                                    </div>
                                    <div class="border-bottom w-100"></div>
                                    <div class="d-flex justify-content-between pt-6">
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">تاریخ ثبت :</span>
                                            <?php echo verta($order->created_at)->format('Y/m/d');?>
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">کد سفارش :</span>
                                            {{$order->tracking_code}}
                                        </div>
                                        <div class="d-flex flex-column flex-root">
                                            <span class="font-weight-bolder mb-2">آدرس تحویل :</span>
                                            {{getcity($address->city_id).' - '.$address->address}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice header-->
                            <!-- begin: Invoice body-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="pl-0 font-weight-bold text-uppercase">محصول</th>
                                                    <th class="text-right font-weight-bold text-uppercase">تعداد</th>
                                                    <th class="text-right font-weight-bold text-uppercase">قیمت</th>
                                                    <th class="text-right font-weight-bold text-uppercase">قیمت با تخفیف</th>
                                                    <th class="text-right pr-0 font-weight-bold text-uppercase">مبلغ پرداختی</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->products as $product )
                                                    <tr class="font-weight-boldest">
                                                        <td class="border-0 pl-0 pt-7 d-flex align-items-center">
                                                            <!--begin::Symbol-->
                                                            @if (count($product->photos) > 0)
                                                                @foreach ($product->photos as $photo)
                                                                    <div class="symbol symbol-40 flex-shrink-0 mr-4 bg-light">
                                                                        <div class="symbol-label" style="background-image: url('{{asset($photo->src)}}')"></div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            <!--end::Symbol-->
                                                            @if ($product->pivot->color_id != 0)
                                                                {{$product->title.' ( '.colorname($product->pivot->color_id).' )'}}
                                                            @else
                                                                {{$product->title}}
                                                            @endif
                                                        </td>
                                                        <td class="text-right pt-7 align-middle">{{$product->pivot->quantity}}</td>
                                                        <td class="text-right pt-7 align-middle">{{priceFormatter($product->pivot->price)}}</td>
                                                        @if ($product->pivot->price_discounted == 0)
                                                            <td class="text-right pt-7 align-middle">------</td>
                                                            <td class="text-primary pr-0 pt-7 text-right align-middle">{{priceFormatter($product->pivot->price * $product->pivot->quantity)}}</td>
                                                        @else
                                                            <td class="text-right pt-7 align-middle">{{priceFormatter($product->pivot->price_discounted)}}</td>
                                                            <td class="text-primary pr-0 pt-7 text-right align-middle">{{priceFormatter($product->pivot->price_discounted * $product->pivot->quantity)}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice body-->
                            <!-- begin: Invoice footer-->
                            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                                <div class="col-md-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bold text-uppercase">نوع پرداخت :</th>
                                                    <th class="font-weight-bold text-uppercase">وضعیت سفارش :</th>
                                                    <th class="font-weight-bold text-uppercase text-right">مبلغ کل :</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="font-weight-bolder">
                                                    <td>Zarin Pal</td>
                                                    @switch($order->status)
                                                        @case('success')
                                                            <td>ثبت شده</td>
                                                        @break
                                                        @case('failed')
                                                            <td>ناموفق</td>
                                                        @break
                                                        @case('sending')
                                                            <td>در حال ارسال</td>
                                                        @break 
                                                        @case('done')
                                                            <td>تحویل داده شده</td>
                                                        @break

                                                        @default
                                                    @endswitch
                                                    <td class="text-primary font-size-h3 font-weight-boldest text-right">{{priceFormatter($order->amount_payable)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice footer-->
                            <!-- begin: Invoice action-->
                            <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">دانلود</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end: Invoice action-->
                            <!-- end: Invoice-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Page Layout-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection