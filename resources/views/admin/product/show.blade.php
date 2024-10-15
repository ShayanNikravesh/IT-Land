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
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">جزئیات محصول</h3>
                </div>
                <!--begin::Form-->
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <span class="">{{$product->title}}</span>
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <span class="">{{$product->english_title}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="text-right">دسته بندی :</label>
                                <span class="">{{$product->category->title}}</span>
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">برند :</label>
                                <span class="">{{$product->brand->title}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            @if ($product->memory || $product->ram)
                                <div class="col-lg-6">
                                    <label class="text-right">حافظه :</label>
                                    <span class="">{{$product->memory->size}}</span>
                                    <span class="">{{$product->memory->name}}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label class="text-right">رم :</label>
                                    <span class="">{{$product->ram->size}}</span>
                                    <span class="">{{$product->ram->name}}</span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="text-right"> مشخصات و توضیحات :</label>
                                {!!$product->description!!}
                            </div>
                            <div class="col-lg-12">
                                <label class="text-right">نقد و بررسی :</label>
                                {!!$product->review!!}
                            </div>
                        </div>
                        @if ($product->has_color == 1)
                            @foreach ($product->colors as $color)
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="text-right">رنگ :</label>
                                        <span class="">{{$color->name}}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>موجودی :</label>
                                        <span class="">{{$color->pivot->stock}}</span>                                    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>قیمت:</label>
                                        <span class="">{{$color->pivot->price}}</span>                                    
                                    </div>
                                    <div class="col-lg-6">
                                        <label>قیمت با تخفیف:</label>
                                        <span class="">{{$color->pivot->price_discounted}}</span>                                    
                                    </div>
                                </div>
                            @endforeach
                        @else
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>قیمت:</label>
                                        <span class="">{{priceFormatter($product->price)}}</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>قیمت با تخفیف:</label>
                                        <span class="">{{priceFormatter($product->price_discounted)}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>موجودی:</label>
                                        <span class="">{{$product->stock}}</span>                                   
                                    </div>
                                </div>
                        @endif
                    </div>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection