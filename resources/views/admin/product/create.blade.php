@extends('admin.layouts.master')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
		<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-2">
				<!--begin::Page Title-->
				<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">ایجاد محصول</h5>
				<!--end::Page Title-->
				<!--begin::Actions-->
				<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
				<span class="font-weight-bold mr-4">در این صفحه می توانید محصول جدید ایجاد کنید.</span>
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
                    <h3 class="card-title">افزودن محصول</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" action="{{route('product.store')}}" id="kt_form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>عنوان:</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید...">
                            </div>
                            <div class="col-lg-6">
                                <label>عنوان انگلیسی:</label>
                                <input type="text" name="english_title" class="form-control" placeholder="عنوان انگلیسی را وارد کنید...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="text-right">دسته بندی :</label>
                                <select name="category" class="form-control text-right selectpicker">
                                    <option value="">انتخاب کنید....</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">برند :</label>
                                <select name="brand" class="form-control text-right selectpicker">
                                    <option value="">انتخاب کنید....</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="text-right">حافظه :</label>
                                <select name="memory" class="form-control text-right selectpicker">
                                    <option value="">انتخاب کنید....</option>
                                    @foreach ($memories as $memory)
                                        <option value="{{$memory->id}}">{{$memory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="text-right">رم :</label>
                                <select name="ram" class="form-control text-right selectpicker">
                                    <option value="">انتخاب کنید....</option>
                                    @foreach ($rams as $ram)
                                        <option value="{{$ram->id}}">{{$ram->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="text-right"> مشخصات و توضیحات :</label>
                                <textarea class="summernote" name="description" style="display: none;"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-right">نقد و بررسی :</label>
                                <textarea class="summernote" name="review" style="display: none;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="text-right">وضعیت:</label>
                                <select name="status" class="form-control text-right selectpicker">
                                    <option value="">انتخاب کنید</option>
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>تنوع رنگ :</label>
                                <div class="radio-inline">
                                    <label class="radio">
                                        <input type="radio" name="has_color" value="1"/>
                                        <span></span>
                                        دارد
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="has_color" value="0"/>
                                        <span></span>
                                        ندارد
                                    </label>
                                </div>
                                <span class="form-text text-muted">لطفا انتخاب کنید.</span>
                            </div>
                        </div>
                        {{-- Color-variants-section Start --}}
                        <div id="no-color-section" style="display: none">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>قیمت:</label>
                                    <input type="number" name="price" class="form-control" placeholder="قیمت را وارد کنید...">
                                </div>
                                <div class="col-lg-6">
                                    <label>قیمت با تخفیف:</label>
                                    <input type="number" name="price_discounted" class="form-control" placeholder="قیمت با تخفیف را وارد کنید...">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>موجودی:</label>
                                    <input type="number" name="stock" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div id="color-variants-section" style="display:none">
                            <div id="container">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="text-right">رنگ :</label>
                                        <select name="color[]" class="form-control text-right selectpicker">
                                            <option value="0">انتخاب کنید....</option>
                                            @foreach ($colors as $color)
                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>موجودی :</label>
                                        <input type="number" name="color_stock[]" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>قیمت:</label>
                                        <input type="number" name="color_price[]" class="form-control" placeholder="قیمت را وارد کنید...">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>قیمت با تخفیف:</label>
                                        <input type="number" name="color_price_discounted[]" class="form-control" placeholder="قیمت با تخفیف را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <button type="button" id="add-color-variant" class="btn btn-primary mr-2">اضافه کردن رنگ جدید</button>
                                </div>
                            </div>
                        </div>
                        {{-- Color-variants-section End --}}
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

    document.querySelectorAll('input[name="has_color"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            const colorSection = document.getElementById("color-variants-section");
            const noColorSection = document.getElementById("no-color-section");

            if (event.target.value === "1") {
                colorSection.style.display = "block";
                noColorSection.style.display = "none"; // مخفی کردن بخش دیگر
            } else {
                colorSection.style.display = "none"; // مخفی کردن این بخش
                noColorSection.style.display = "block"; // نمایش بخش دیگر
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('add-color-variant');
        const originalContainer = document.getElementById('container');
        const colorVariantsSection = document.getElementById('color-variants-section');

        addButton.addEventListener('click', function() {
            // کپی کردن container
            const newContainer = originalContainer.cloneNode(true);
            
            // نمایش کپی جدید
            newContainer.style.display = 'block'; 
            
            // اضافه کردن newContainer قبل از دکمه
            colorVariantsSection.insertBefore(newContainer, addButton.parentNode.parentNode);
        });
    });

</script>
@endsection