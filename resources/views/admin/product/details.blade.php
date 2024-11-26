@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">جزئیات محصول</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="font-weight-bold mr-4">در این صفحه می توانید جزئیات محصول را مشاهده کنید.</span>
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
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body p-15 pb-20">
                    <div class="row mb-17">
                        <div class="col-xxl-7 pl-xxl-11">
                            <h2 class="font-weight-bolder text-dark" style="font-size: 32px;">{{$product->title}}</h2>
                            <h2 class="text-muted font-weight-bolder font-size-lg" style="font-size: 32px;">{{$product->title}}</h2>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <!--begin::Info-->
                        <div class="col-6 col-md-4">
                            <div class="mb-8 d-flex flex-column">
                                <span class="text-dark font-weight-bold mb-4">کد محصول :</span>
                                <span class="text-muted font-weight-bolder font-size-lg">{{$product->tracking_code}}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-8 d-flex flex-column">
                                <span class="text-dark font-weight-bold mb-4">دسته بندی :</span>
                                <span class="text-muted font-weight-bolder font-size-lg">{{$product->category->title}}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-8 d-flex flex-column">
                                <span class="text-dark font-weight-bold mb-4">برند :</span>
                                <span class="text-muted font-weight-bolder font-size-lg">{{$product->brand->title}}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-8 d-flex flex-column">
                                <span class="text-dark font-weight-bold mb-4">مشخصات و توضیحات :</span>
                                <span class="text-muted font-weight-bolder font-size-lg">{!!$product->description!!}</span>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="mb-8 d-flex flex-column">
                                <span class="text-dark font-weight-bold mb-4">نقد و بررسی :</span>
                                <span class="text-muted font-weight-bolder font-size-lg">{!!$product->review!!}</span>
                            </div>
                        </div>
                        @if ($product->memory || $product->ram)
                            <div class="col-6 col-md-4">
                                <div class="mb-8 d-flex flex-column">
                                    <span class="text-dark font-weight-bold mb-4">حافظه :</span>
                                    <span class="text-muted font-weight-bolder font-size-lg">{{$product->memory->size.' '.$product->memory->name}}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-8 d-flex flex-column">
                                    <span class="text-dark font-weight-bold mb-4">رم :</span>
                                    <span class="text-muted font-weight-bolder font-size-lg">{{$product->ram->size.' '.$product->ram->name}}</span>
                                </div>
                            </div>
                        @endif
                        @if ($product->has_color == 1)
                            @foreach ($product->colors as $color)
                                <div class="col-6 col-md-4">
                                    <div class="mb-8 d-flex flex-column">
                                        <span class="text-dark font-weight-bold mb-4">رنگ :</span>
                                        <span class="text-muted font-weight-bolder font-size-lg">{{$color->name}}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="mb-8 d-flex flex-column">
                                        <span class="text-dark font-weight-bold mb-4">قیمت :</span>
                                        <span class="text-muted font-weight-bolder font-size-lg">{{priceFormatter($color->pivot->price)}}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="mb-8 d-flex flex-column">
                                        <span class="text-dark font-weight-bold mb-4">قیمت با تخفیف :</span>
                                        <span class="text-muted font-weight-bolder font-size-lg">{{priceFormatter($color->pivot->price_discounted)}}</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="mb-8 d-flex flex-column">
                                        <span class="text-dark font-weight-bold mb-4">موجودی :</span>
                                        <span class="text-muted font-weight-bolder font-size-lg">{{$color->pivot->stock}}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-6 col-md-4">
                                <div class="mb-8 d-flex flex-column">
                                    <span class="text-dark font-weight-bold mb-4">قیمت :</span>
                                    <span class="text-muted font-weight-bolder font-size-lg">{{priceFormatter($product->price)}}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-8 d-flex flex-column">
                                    <span class="text-dark font-weight-bold mb-4">قیمت با تخفیف :</span>
                                    <span class="text-muted font-weight-bolder font-size-lg">{{priceFormatter($product->price_discounted)}}</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="mb-8 d-flex flex-column">
                                    <span class="text-dark font-weight-bold mb-4">موجودی :</span>
                                    <span class="text-muted font-weight-bolder font-size-lg">{{$product->stock}}</span>
                                </div>
                            </div>
                        @endif
                        
                        <!--end::Info-->
                    </div>
                    <!--begin::Buttons-->
                    <div class="d-flex">
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary font-weight-bolder mr-6 px-6 font-size-sm">
                            <span class="svg-icon">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            ویرایش
                        </a>
                    </div>
                    <!--end::Buttons-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection