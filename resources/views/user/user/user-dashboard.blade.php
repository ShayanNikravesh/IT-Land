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

                        <!--welcome:start-->
                        <div class="user-panel-verify-identity border border-radius-xl p-3 d-flex justify-content-between align-items-center mb-3 mt-3">
                            <p class="fs-7 text-dark">
                                <i class="fa fa-smile text-dark align-middle pe-1"></i>
                                به فروشگاهی اینترنتی آیتی لند خوش آمدید.
                            </p>
                        </div>
                        <!--welcome:end-->

                        <!--User Panel State:start-->
                        <div class="user-panel-state">
                            <div class="row">
                                <!--User Panel Info:start-->
                                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                                    
                                </div>
                                <!--User Panel Info:end-->
                            </div>
                        </div>
                        <!--User Panel State:end-->
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