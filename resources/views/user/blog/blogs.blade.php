@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="container mt-xxxx-large">
    <!--BreadCrumb:start-->
    <nav class="my-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fs-8"><a href="javascript:;">آیتی لند</a></li>
            <li class="breadcrumb-item fs-8"><a href="javascript:;">وبلاگ</a></li>
        </ol>
    </nav>
    <!--BreadCrumb:end-->
    <section class="blog-section">
        <!--Posts:start-->
        <div class="row">
            @foreach ($articles as $article)
                <!--Blog Item:start-->
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="blog-item">
                        <div class="blog-item-picture">
                            <a href="{{route('blog',$article->id)}}">
                                @foreach ($article->photos as $photo)
                                    <img src="{{asset($photo->src)}}" alt="" class="w-100">
                                @endforeach
                            </a>
                        </div>
                        <div class="blog-item-details">
                            <h3 class="fs-6 mb-3">
                                <a href="{{route('blog',$article->id)}}">
                                    {{$article->title}}
                                </a>
                            </h3>
                        </div>
                        <div class="blog-item-footer px-3 d-flex justify-content-between align-items-center">
                            <p class="author">
                                <a href="javascript:;">
                                    <img src="{{asset('user-assets/img/no-avatar.jpg')}}" alt="" class="blog-img border-radius-circle object-cover">
                                    <span class="fs-8 ps-1">{{$article->first_name.' '.$article->last_name}}</span>
                                </a>
                            </p>
                            <p class="fs-8 gray-600">
                                <i class="fa fa-calendar"></i>
                                <?php echo verta($article->created_at)->format('Y/m/d');?>                            
                            </p>
                        </div>
                    </div>
                </div>
                <!--Blog Item:end-->
            @endforeach
        </div>
        <!--Posts:end-->
    </section>
</main>
<!--Main:end-->

@endsection()