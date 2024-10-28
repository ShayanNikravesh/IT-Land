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

                        <!--User Panel Profile:start-->
                        <div class="user-panel-profile mt-3 border border-radius-xl">
                            <!--User Panel Profile Header:start-->
                            <div class="user-panel-profile-header d-flex justify-content-between align-items-center p-3 border-bottom-gray-300 mb-3">
                                <p class="fw-bold">مدیریت پروفایل :</p>
                            </div>
                            <!--User Panel Profile Header:end-->

                            <!--User Panel Profile Content:start-->
                            <div class="user-panel-profile-content p-3">
                                <form class="row g-3" method="POST" action="{{route('User.update',Auth::guard('web')->user()->id)}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6">
                                        <label for="name1" class="form-label fw-bold">نام :</label>
                                        <input type="text" class="form-control border-radius-xl" id="name1" name="first_name" placeholder="نام خود را وارد کنید ..." value="{{$user->first_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name1" class="form-label fw-bold">نام خانوادگی :</label>
                                        <input type="text" class="form-control border-radius-xl" id="name1" name="last_name" placeholder="نام خانوادگی خود را وارد کنید ..." value="{{$user->last_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phoneNumber1" class="form-label fw-bold">کد ملی :</label>
                                        <input type="tel" class="form-control border-radius-xl" id="phoneNumber1" name="national_code" placeholder="شماره موبایل خود را وارد کنید..." value="{{$user->national_code}}">
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label class="form-label fw-bold">عکس پروفایل :</label>
                                        <input type="file" name="profile_photo" class="form-control border-radius-xl">
                                    </div> --}}
                                    <div class="col-12">
                                        <button type="submit" class="btn custom-btn-danger border-radius-xl">ذخیره
                                            اطلاعات
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--User Panel Profile Content:end-->
                        </div>
                        <!--User Panel Profile:end-->
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