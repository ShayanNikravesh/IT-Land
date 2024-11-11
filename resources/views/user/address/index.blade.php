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

                        <!--User Panel Addresses:start-->
                        <div class="user-panel-comments mt-3 border border-radius-xl">
                            <!--User Panel Addresses Header:start-->
                            <div class="user-panel-comments-header d-flex justify-content-between align-items-center p-3 border-bottom-gray-300">
                                <p class="fw-bold">آدرس های من</p>
                                <a href="" class="btn btn-outline-primary fs-7 border-radius-xl py-2" data-bs-toggle="modal" data-bs-target="#insertNewAddressModal">
                                    <i class="fa fa-plus"></i>
                                    ثبت آدرس جدید
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="insertNewAddressModal">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    افزودن آدرس جدید
                                                    <span class="d-block fs-7 gray-600 fw-lighter mt-2">لطفا همه فیلد ها را پر کنید.</span>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($errors->any())
                                                    <div>
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li class="bg-danger rounded text-white text-center">{{ $error }}</li>
                                                                <br>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form method="POST" action="{{route('Address.store')}}" class="row g-3">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label fw-bold">نام :</label>
                                                        <input type="text" name="first_name" class="form-control border-radius-xl" id="name" placeholder="نام را وارد کنید ...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label fw-bold">نام خانوادگی :</label>
                                                        <input type="text" name="last_name" class="form-control border-radius-xl" id="name" placeholder="نام خانوادگی را وارد کنید ...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="province" class="form-label fw-bold">انتخاب استان :</label>
                                                        <select id="province" name="province" class="wide mt-2 border-radius-xl form-control">
                                                            <option value="">انتخاب کنید.</option>
                                                            @foreach ($provinces as $province)
                                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="city" class="form-label fw-bold">انتخاب شهر</label>
                                                        <select id="city" name="city" class="wide mt-2 border-radius-xl form-control">
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="postCode" class="form-label fw-bold">کد پستی</label>
                                                        <input type="text" name="post_code" class="form-control border-radius-xl" id="postCode" placeholder="کد پستی را بدون خط تیره وارد کنید ...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phoneNumber" class="form-label fw-bold">شماره موبایل</label>
                                                        <input type="tel" name="mobile" class="form-control border-radius-xl" id="phoneNumber" placeholder="09xxxxxxxxx">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="address" class="form-label fw-bold">آدرس پستی</label>
                                                        <textarea name="address" class="form-control border-radius-xl" id="address" rows="3" placeholder="آدرس تحویل گیرنده مرسوله را وارد کنید ..."></textarea>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn custom-btn-primary border-radius-xl">ثبت آدرس</button>
                                                        <button type="button" class="text-info btn fw-lighter" data-bs-dismiss="modal">انصراف و برگشت</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--User Panel Addresses Header:end-->
                            @if (count($addresses) > 0)
                                <!--User Panel Addresses Content:start-->
                                @foreach ($addresses as $address)
                                    <div class="user-panel-comments-content p-4">
                                        <!--User Panel Address Item:start-->
                                        <div class="user-panel-address-item bg-gray-150 p-2 mb-3">
                                            <div>
                                                <!--User Panel Comment Item Header:start-->
                                                <div class="user-panel-comment-item-header d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2">
                                                    <p class="fw-bold">
                                                        {{$address->address}}
                                                        @if ($address->is_default == 'yes')
                                                            <span class="badge bg-info">پیش فرض</span>
                                                        @endif
                                                    </p>
                                                    <div class="dropdown">
                                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span>
                                                                <!--begin::Svg Icon-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                        <circle fill="#000000" cx="12" cy="5" r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                        <circle fill="#000000" cx="12" cy="19" r="2"></circle>
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item py-2" href="#" data-bs-toggle="modal" data-bs-target="#updateAddressModal{{$address->id}}">
                                                                    <i class="fa fa-pen pe-4"></i>
                                                                    ویرایش آدرس
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('Address.destroy',$address->id)}}" class="dropdown-item py-2" method="POST" data-confirm-delete="true">
                                                                    <i class="fa fa-trash-alt pe-4 text-danger"></i>
                                                                    حذف آدرس
                                                                </a>
                                                            </li>
                                                            @if ($address->is_default == 'no')
                                                                <li>
                                                                    <a href="{{route('set-default',$address->id)}}" class="dropdown-item py-2">
                                                                        <i class="fa fa-address-card pe-4 text-primary"></i>
                                                                        آدرس پیش فرض
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                        <div class="modal fade" id="updateAddressModal{{$address->id}}">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            ویرایش آدرس
                                                                            <span class="d-block fs-7 gray-600 fw-lighter mt-2">آدرس تحویل سفارش را ویرایش کنید.</span>
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @if ($errors->any())
                                                                            <div>
                                                                                <ul>
                                                                                    @foreach ($errors->all() as $error)
                                                                                        <li class="bg-danger rounded text-white text-center">{{ $error }}</li>
                                                                                        <br>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        @endif
                                                                        <form method="POST" action="{{route('Address.update',$address->id)}}" class="row g-3">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="col-md-6">
                                                                                <label for="first_name" class="form-label fw-bold">نام :</label>
                                                                                <input type="text" name="first_name" class="form-control border-radius-xl" id="first_name" value="{{$address->first_name}}">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="last_name" class="form-label fw-bold">نام خانوادگی :</label>
                                                                                <input type="text" name="last_name" class="form-control border-radius-xl" id="last_name" value="{{$address->last_name}}">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="province" class="form-label fw-bold">انتخاب استان :</label>
                                                                                <select id="editprovince" name="province" class="wide mt-2 border-radius-xl form-control">
                                                                                    <option value="">انتخاب کنید.</option>
                                                                                    @foreach ($provinces as $province)
                                                                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="city" class="form-label fw-bold">انتخاب شهر</label>
                                                                                <select id="city" name="city" class="wide mt-2 border-radius-xl form-control">
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="postCode" class="form-label fw-bold">کد پستی</label>
                                                                                <input type="text" name="post_code" class="form-control border-radius-xl" id="postCode" value="{{$address->post_code}}">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="phoneNumber" class="form-label fw-bold">شماره موبایل</label>
                                                                                <input type="tel" name="mobile" class="form-control border-radius-xl" id="phoneNumber" value="{{$address->mobile}}">
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <label for="address" class="form-label fw-bold">آدرس پستی</label>
                                                                                <textarea name="address" class="form-control border-radius-xl" id="address" rows="3">{{$address->address}}</textarea>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <button type="submit" class="btn custom-btn-primary border-radius-xl">ثبت آدرس</button>
                                                                                <button type="button" class="text-info btn fw-lighter" data-bs-dismiss="modal">انصراف و برگشت</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--User Panel Comment Item Header:end-->

                                                <!--User Panel Comment Item Content:start-->
                                                <div class="user-panel-comment-item-content px-3 py-1">
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-road pe-2 gray-600"></i>
                                                        {{$address->city->name}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-envelope pe-2 gray-600"></i>
                                                        {{$address->post_code}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-phone pe-2 gray-600"></i>
                                                        {{$address->mobile}}
                                                    </p>
                                                    <p class="py-1 gray-900 fw-light">
                                                        <i class="fa fa-user pe-2 gray-600"></i>
                                                        {{$address->first_name.' '.$address->last_name}}
                                                    </p>
                                                </div>
                                                <!--User Panel Comment Item Content:end-->
                                            </div>
                                        </div>
                                        <!--User Panel Address Item:end-->

                                    </div>
                                @endforeach
                                <!--User Panel Addresses Content:end-->
                            @else
                                <div class="text-center my-5">
                                    <img src="assets/img/address.svg" alt="">
                                    <p class="fs-8">هنوز هیچ آدرسی ثبت نکرده اید.</p>
                                </div>    
                            @endif
                            
                        </div>
                        <!--User Panel Addresses:end-->
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