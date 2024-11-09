@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="container mt-xxxx-large">
    <!--BreadCrumb:start-->
    <nav class="my-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fs-8"><a href="javascript:;">آیتی لند</a></li>
            <li class="breadcrumb-item fs-8"><a href="{{route('blogs')}}">وبلاگ</a></li>
            <li class="breadcrumb-item fs-8"><a href="javascript:;">تک مطلب</a></li>
        </ol>
    </nav>
    <!--BreadCrumb:end-->

    <!--Blog Post:start-->
    <div class="blog-post mt-3 mb-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <!--Blog Post Wrapper:start-->
                <div class="blog-post-wrapper">
                    <!--Article:start-->
                    <article class="mt-4">
                        <!--Blog Post Header:start-->
                        <div class="blog-post-header">
                            <!--Blog Post Header Title:start-->
                            <div class="blog-post-header-title d-flex justify-content-between align-items-baseline">
                                <h1 class="fs-5 fw-bold">{{$article->title}}</h1>
                            </div>
                            <!--Blog Post Header Title:end-->
                            <!--Blog Post Header Detail:start-->
                            <div class="blog-post-header-detail mt-4 d-flex justify-content-between align-items-center">
                                <!--Blog Post Header Detail Right:start-->
                                <div class="blog-post-header-detail-right">
                                    <!--Blog Post Author:start-->
                                    <div class="blog-post-author">
                                        <img src="{{asset('user-assets/img/no-avatar.jpg')}}" alt="" class="border-radius-circle">
                                        <span class="ps-1 fs-7 gray-600">{{$article->first_name.' '.$article->last_name}}</span>
                                        <span class="fs-7 ps-4 gray-500">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo verta($article->created_at)->format('Y/m/d');?>                                        
                                        </span>
                                    </div>
                                    <!--Blog Post Author:end-->
                                </div>
                                <!--Blog Post Header Detail Right:end-->

                                <!--Blog Post Header Detail Left:start-->
                                <div class="blog-post-header-detail-left">
                                </div>
                                <!--Blog Post Header Detail Left:end-->
                            </div>
                            <!--Blog Post Header Detail:end-->
                        </div>
                        <!--Blog Post Header:end-->

                        <!--Blog Post Content:start-->
                        <div class="blog-post-content mt-4">
                            <!--Blog Post Image:start-->
                            @foreach ($article->photos as $photo)
                                    <img src="{{asset($photo->src)}}" alt="" class="w-100 rounded">
                            @endforeach
                            <!--Blog Post Image:end-->
                            <p class="mt-3">
                                {!!$article->article!!}
                            </p>
                        </div>
                        <!--Blog Post Content:end-->
                    </article>
                    <!--Article:end-->
                </div>
                <!--Blog Post Wrapper:end-->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <aside>
                    <!--Aside Item:start-->
                    @foreach ($articles as $article)
                        <div class="aside-item p-2 my-2 position-relative d-flex justify-content-start align-items-center">
                            <div class="aside-item-image">
                                @foreach ($article->photos as $photo)
                                    <img src="{{asset($photo->src)}}" alt="" class="object-cover border-radius-xl">
                                @endforeach
                            </div>
                            <div class="aside-item-content ms-3 d-flex flex-column justify-content-start align-items-start">
                                <strong class="fs-7">{{$article->title}}</strong>
                                <span class="fs-8 pt-3 gray-500">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo verta($article->created_at)->format('Y/m/d');?>                                 
                                </span>
                            </div>
                            <a href="{{route('blog',$article->id)}}" class="stretched-link"></a>
                        </div>
                    @endforeach
                    <!--Aside Item:end-->
                </aside>
            </div>
        </div>
    </div>
    <!--    Blog Post:end-->
</main>
<!--Main:end-->

@endsection()