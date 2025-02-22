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

                        <!--User Panel Comments:start-->
                        <div class="user-panel-comments mt-3 border border-radius-xl">
                            <!--User Panel Comments Header:start-->
                            <div class="user-panel-comments-header d-flex justify-content-between align-items-center p-3 border-bottom-gray-300">
                                <p class="fw-bold">دیدگاه های من</p>
                            </div>
                            <!--User Panel Comments Header:end-->
                            @if (count($comments) > 0 )
                                @foreach ($comments as $comment)
                                    <!--User Panel Comments Content:start-->
                                    <div class="user-panel-comments-content p-4">
                                        <!--User Panel Comment Item:start-->
                                        <div class="user-panel-comment-item d-flex justify-content-start align-items-center bg-gray-150 p-2 mb-3">
                                            <div class="user-panel-comment-item-image p-3">
                                                <a href="{{route('Product.show',$comment->product->id)}}" class="btn" data-toggle="tooltip" data-placement="top" title="رفتن به محصول">
                                                    {{$comment->product->title}}
                                                </a>
                                            </div>
                                            <div>
                                                <!--User Panel Comment Item Header:start-->
                                                <div class="user-panel-comment-item-header d-flex justify-content-between align-items-center border-bottom-gray-300 pb-2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        @switch($comment->status)
                                                            @case('active')
                                                                <span class="badge d-block custom-box-shadow-s-1 bg-green">تایید شده</span>
                                                                @break
                                                            @case('inactive')
                                                                <span class="badge d-block custom-box-shadow-s-1 bg-warning">در انتظار تایید</span>
                                                                @break
                                                            @default
                                                        @endswitch
                                                    </div>
                                                </div>
                                                <!--User Panel Comment Item Header:end-->

                                                <!--User Panel Comment Item Content:start-->
                                                <div class="user-panel-comment-item-content">
                                                    <p class="py-3 gray-900 fw-light">
                                                        {{$comment->comment}}
                                                    </p>
                                                </div>
                                                <!--User Panel Comment Item Content:end-->
                                            </div>
                                        </div>
                                        <!--User Panel Comment Item:end-->
                                    </div>
                                    <!--User Panel Comments Content:end-->
                                @endforeach
                            @else
                                <div class="text-center my-5">
                                    <img src="{{asset('user-assets/img/order-empty.svg')}}" alt="">
                                    <p class="fs-8">هنوز هیچ نظری ندارید.</p>
                                </div>
                            @endif
                        </div>
                        <!--User Panel Comments:end-->
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