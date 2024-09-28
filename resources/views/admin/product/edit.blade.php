@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ویرایش محصول</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="font-weight-bold mr-4">در این صفحه می توانید محصول را ویرایش کنید.</span>
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
                    <h3 class="card-title">ویرایش محصول</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('product.update',$product)}}" id="kt_form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <input type="text" name="title" class="form-control" value="{{$product->title}}">
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <input type="text" name="english_title" class="form-control" value="{{$product->english_title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="text-right"> مشخصات و توضیحات :</label>
                                <textarea class="summernote" name="description" style="display: none;" value="{{$product->description}}">{{$product->description}}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-right">نقد و بررسی :</label>
                                <textarea class="summernote" name="review" style="display: none;" value="{{$product->review}}">{{$product->review}}</textarea>
                            </div>
                        </div>
                        @if ($product->has_color == 1)
                            @foreach ($product->colors as $product_color)
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="text-right">رنگ :</label>
                                        <select name="color[]" class="form-control text-right selectpicker">
                                            <option value="">انتخاب کنید....</option>
                                            @foreach ($colors as $color)
                                                <option {{$color->id == $product_color->pivot->color_id ? 'selected' : ''}} value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>موجودی :</label>
                                        <input type="number" name="color_stock[]" class="form-control" value="{{$product_color->pivot->stock}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>قیمت:</label>
                                        <input type="number" name="color_price[]" class="form-control" value="{{$product_color->pivot->price}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>قیمت با تخفیف:</label>
                                        <input type="number" name="color_price_discounted[]" class="form-control" value="{{$product_color->pivot->price_discounted}}">
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-6">
                                <label>رنگ جدید :</label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" name="new_color" value="1"/>
                                        <span></span>
                                        بله
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="new_color" value="0"/>
                                        <span></span>
                                        خیر
                                    </label>
                                </div>
                                <span class="form-text text-muted">لطفا انتخاب کنید.</span>
                            </div>
                            {{-- Color-variants-section Start --}}
                            <div id="color_variants_section" style="display:none">
                                <div id="container">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="text-right">رنگ :</label>
                                            <select name="new_color[]" class="form-control text-right selectpicker">
                                                <option value="">انتخاب کنید....</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>موجودی :</label>
                                            <input type="number" name="new_color_stock[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>قیمت:</label>
                                            <input type="number" name="new_color_price[]" class="form-control" placeholder="قیمت را وارد کنید...">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>قیمت با تخفیف:</label>
                                            <input type="number" name="new_color_price_discounted[]" class="form-control" placeholder="قیمت با تخفیف را وارد کنید...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <button type="button" id="add_color_variant" class="btn btn-primary mr-2">اضافه کردن رنگ جدید</button>
                                    </div>
                                </div>
                            </div>
                            {{-- Color-variants-section End --}}
                        @else
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>قیمت:</label>
                                    <input type="number" name="price" class="form-control" value="{{$product->price}}">
                                </div>
                                <div class="col-lg-6">
                                    <label>قیمت با تخفیف:</label>
                                    <input type="number" name="price_discounted" class="form-control" value="{{$product->price_discounted}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>موجودی:</label>
                                    <input type="number" name="stock" class="form-control" value="{{$product->stock}}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mr-2">ثبت</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

{{-- js codes Start --}}
<script>

document.querySelectorAll('input[name="new_color"]').forEach((elem) => {
    elem.addEventListener("change", function(event) {
        const colorSection = document.getElementById("color_variants_section");

        if (event.target.value === "1") {
            colorSection.style.display = "block";
        } else{
            colorSection.style.display = "none";
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementById('add_color_variant');
    const originalContainer = document.getElementById('container');
    const colorVariantsSection = document.getElementById('color_variants_section');

    addButton.addEventListener('click', function() {
        // کپی کردن container
        const newContainer = originalContainer.cloneNode(true);
        
        // نمایش کپی جدید
        newContainer.style.display = 'block'; 
        
        // اضافه کردن newContainer قبل از دکمه
        colorVariantsSection.insertBefore(newContainer, addButton.parentNode.parentNode);
    });
});

// document.addEventListener('DOMContentLoaded', function() {
//     const addButton = document.getElementById('add_color_variant');
//     const originalContainer = document.getElementById('container1');
//     const colorVariantsSection = document.getElementById('color_variants_section');

//     addButton.addEventListener('click', function() {

//         // کپی کردن container
//         const newContainer = colorVariantsSection.cloneNode(true);
        
//         // نمایش کپی جدید
//         newContainer.style.display = 'block'; 
        
//         // اضافه کردن newContainer قبل از دکمه
//         originalContainer.insertBefore(newContainer, addButton.parentNode.parentNode);
//     });
// });

// document.getElementById("add_color_variant").addEventListener("click", function() {
//     // پیدا کردن div رنگ
//     var colorVariantSection = document.getElementById("color_variants_section");

//     // کپی کردن محتوا
//     var newColorVariant = colorVariantSection.cloneNode(true);
    
//     // نشان دادن div کپی شده
//     newColorVariant.style.display = 'block'; // یا هر استایل دیگری که می‌خواهید

//     // اضافه کردن به targetDiv
//     var container = document.getElementById("container1");
//     container.appendChild(newColorVariant);
// });

</script>



</script>
@endsection