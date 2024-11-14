@extends('user.layouts.master')

@section('content')

<!--Main:start-->
<main class="container mt-xxxx-large">
    {{-- <!--    BreadCrumb:start-->
    <nav class="my-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fs-8"><a href="#">برگ شاپ</a></li>
            <li class="breadcrumb-item fs-8"><a href="#">کالای دیجیتال</a></li>
            <li class="breadcrumb-item fs-8"><a href="#">لپ تاپ</a></li>
        </ol>
    </nav>
    <!--    BreadCrumb:end--> --}}

    <!--Product Details:start-->
    <section class="product-details">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 position-relative">
                <!--Product Incredible Offer:start-->
                <div class="product-incredible-offer ms-5">
                    <img src="{{asset('user-assets/img/IncredibleOffer.svg')}}" alt="">
                    <div class="timer-wrapper">
                    </div>
                </div>
                <!--Product Incredible Offer:end-->

                <!--Product Action:start-->
                <div class="product-action">
                    <div class="add-to-favourites mb-3" data-bs-toggle="tooltip" data-bs-placement="right" title="افزودن به علاقه مندی ها">
                        @if (isFavorite($product->id) == true)
                            <a href="{{route('delete-favorite',$product->id)}}" class="gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{route('add-to-favorite',$product->id)}}" class="gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                            </a>                            
                        @endif
                    </div>
                    <div class="share mb-3" data-bs-toggle="tooltip" data-bs-placement="right" title="اشتراک گذاری">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-share" viewBox="0 0 16 16" data-bs-toggle="modal"
                             data-bs-target="#shareModal">
                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                        </svg>
                        <!-- Modal -->
                        <div class="modal fade" id="shareModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold fs-6" id="exampleModalLabel">اشتراک گذاری</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center fw-bold fs-7">این کالا را با دوستان خود به اشتراک
                                            گذارید!</p>
                                        <div class="d-grid gap-2 mt-2">
                                            <a href="" class="btn btn-outline-secondary border-radius-xl fs-7">
                                                <i class="fa fa-copy align-middle pe-2"></i>
                                                کپی کردن لینک
                                            </a>
                                        </div>
                                        <div class="row mt-3 border-bottom-gray-300 pb-3">
                                            <div class="col-6">
                                                <div class="d-grid gap-2 mt-2">
                                                    <a href=""
                                                       class="btn custom-btn-success py-2 border-radius-xl fs-7">
                                                        <i class="fab fa-whatsapp align-middle pe-2"></i>
                                                        واتس اپ
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-grid gap-2 mt-2">
                                                    <a href=""
                                                       class="btn custom-btn-primary py-2 border-radius-xl fs-7">
                                                        <i class="fab fa-twitter align-middle pe-2"></i>
                                                        تویتر
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-grid gap-2 mt-2">
                                                    <a href="" class="btn custom-btn-info py-2 border-radius-xl fs-7">
                                                        <i class="fab fa-facebook align-middle pe-2"></i>
                                                        فیسبوک
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="discount-code d-flex justify-content-between align-items-center p-4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="discount-detail">
                                                        <p class="fw-bold fs-6">کد تخفیف شما</p>
                                                        <p class="fs-7">
                                                            کد را برای دوستان خود بفرستید و پس از
                                                            اولین خرید آنها، کد تخفیف و امتیاز بگیرید!
                                                        </p>
                                                        <a href="" class="btn btn-outline-danger mt-3">
                                                            <i class="fa fa-percent pe-2 fa-xs"></i>
                                                            دریافت کد تخفیف
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="discount-img mt-3 text-center">
                                                        <img src="{{asset('user-assets/img/share-modal.svg')}}" alt="" title="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Product Action:end-->
                <!--Product Images:start-->
                <div class="product-images">
                    @foreach ($product->photos as $photo)
                        @if ($photo->pivot->sort == 1)
                            <img class="xzoom img-fluid" src="{{asset($photo->src)}}" xoriginal="{{asset($photo->src)}}"/>
                        @endif
                    @endforeach
                    <div class="xzoom-thumbs mt-2">
                        @foreach ($product->photos as $photo)
                            <a href="{{asset($photo->src)}}">
                                <img class="xzoom-gallery" src="{{asset($photo->src)}}">
                            </a>
                        @endforeach
                    </div>
                </div>
                <!--Product Images:end-->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <!--Product Details:start-->
                <div class="product-details">
                    <!--Product Title:start-->
                    <h1 class="fs-5 fw-bold">{{$product->title}}</h1>
                    <span class="gray-400 en-title d-block pb-1 fs-7">{{$product->english_title}}</span>
                    <!--Product Title:end-->

                    <div class="row mt-1">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-7">
                            <!--Product Details Right:start-->
                            <div class="product-details-right">
                                <div class="product-attr">
                                    @if (count($comments) > 0)
                                        <span class="separator px-2"><i class="fa fa-circle gray-300"></i></span>
                                        <p class="d-inline text-dark fs-7">
                                            {{count($comments)}} دیدگاه
                                        </p>
                                    @endif
                                </div>
                                @if ($product->has_color == 1)
                                    <div class="product-attr">
                                        <p class="fs-5 fw-bold my-3">رنگ انتخابی : <span id="selectedColor"></span></p>
                                        <div class="product-attr-colors">
                                            @foreach ($product->colors as $color)
                                                <div class="d-inline">
                                                    <input type="hidden" value="{{$product->id}}" id="product-id">
                                                    <input type="radio" value="{{$color->id}}" name="color[]" id="{{$color->name}}" data-color="{{$color->name}}" class="color-radio">
                                                    <label class="border-radius-circle mx-1" style="background-color: {{$color->code}}" for="{{$color->name}}">
                                                        <span class="color-text" data-color="{{$color->name}}">{{$color->name}}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="product-attr my-4">
                                    <p class="fs-5 fw-bold mb-2">ویژگی ها</p>
                                    <ul>
                                        @if ($product->ram)
                                            <li class="fs-6">
                                                <span class="gray-600">ظرفیت حافظه رم :</span>
                                                <span>{{$product->ram->size}}</span>
                                            </li>
                                        @endif
                                        @if ($product->memory)
                                            <li class="fs-6">
                                                <span class="gray-600">ظرفیت حافظه :</span>
                                                <span>{{$product->memory->size}}</span>
                                            </li>
                                        @endif
                                        <hr>
                                        <li class="fs-6">
                                            <span class="gray-600">کد محصول :</span>
                                            <span>{{$product->tracking_code}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Product Details Right:end-->
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
                            <!--Product Details Right:start-->
                            <div class="product-details-left p-3 border-radius-xl">
                                @switch($product->status)
                                        @case('active')
                                            @if ($product->has_color == 1)
                                                <!--Status:start-->
                                                <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                                    <span class="fw-bold fs-7" id="stock">
                                                        <i class="fa fa-box pe-3 align-middle text-info"></i>
                                                        موجود در انبار آیتی لند
                                                    </span>
                                                </div>
                                                <!--Status:end-->
                                                <!--Product Price:start-->
                                                <div id="div" style="display: none">
                                                    <div class="price py-2 d-flex justify-content-between align-items-center">
                                                        <p class="gray-600 fs-7">
                                                            قیمت :
                                                        </p>    
                                                        <div>
                                                            <span class="fw-bold pe-1 fs-4" id="price"></span>
                                                        </div>
                                                    </div>
                                                    <div class="price py-2 d-flex justify-content-between align-items-center">
                                                        <p class="gray-600 fs-7">
                                                            قیمت با تخفیف :
                                                        </p>
                                                        <div>
                                                            <span class="fw-bold pe-1 fs-4" id="price_discounted"></span>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2 mt-2" id="add_cart">
                                                        <a href="" id="add_to_cart" class="btn btn-primary border-radius-xl fs-6">افزودن به سبد خرید</a>
                                                    </div>
                                                </div>
                                                <!--Product Price:end-->
                                            @else
                                                @if ($product->stock > 0)
                                                    <!--Status:start-->
                                                    <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                                        <span class="fw-bold  fs-7">
                                                            <i class="fa fa-box pe-3 align-middle text-info"></i>
                                                            موجود در انبار آیتی لند
                                                        </span>
                                                    </div>
                                                    <!--Status:end-->
                                                @else
                                                    <!--Status:start-->
                                                    <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                                        <span class="fw-bold  fs-7">
                                                            <i class="fa fa-box pe-3 align-middle text-danger"></i>
                                                            این محصول ناموجود است.
                                                        </span>
                                                    </div>
                                                    <!--Status:end-->
                                                @endif
                                                <!--Product Price:start-->
                                                <div class="price py-2 d-flex justify-content-between align-items-center">
                                                    <p class="gray-600 fs-7">
                                                        قیمت :
                                                    </p>
                                                    <div>
                                                        <span class="fw-bold pe-1 fs-4">{{priceFormatter($product->price)}}</span>
                                                    </div>
                                                </div>
                                                <div class="price py-2 d-flex justify-content-between align-items-center">
                                                    <p class="gray-600 fs-7">
                                                        قیمت با تخفیف :
                                                    </p>
                                                    <div>
                                                        <span class="fw-bold pe-1 fs-4">{{priceFormatter($product->price_discounted)}}</span>
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2 mt-2">
                                                    <a href="{{route('add_to_cart',['product_id' => $product->id, 'color_id' => 0])}}" class="btn btn-primary border-radius-xl fs-6">افزودن به سبد خرید</a>
                                                </div>
                                                <!--Product Price:end-->
                                            @endif
                                        @break
                                        @case('stop_selling')
                                            <!--Status:start-->
                                            <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                                <span class="fw-bold  fs-7">
                                                    <i class="fa fa-box pe-3 align-middle text-warning"></i>
                                                    فروش این محصول متوقف شده است.
                                                </span>
                                            </div>
                                            <!--Status:end-->
                                        @break
                                        @case('unavailable')
                                            <!--Status:start-->
                                            <div class="warranty my-2 border-bottom-gray-300 pb-2">
                                                <span class="fw-bold  fs-7">
                                                    <i class="fa fa-box pe-3 align-middle text-danger"></i>
                                                    این محصول ناموجود است.
                                                </span>
                                            </div>
                                            <!--Status:end-->
                                        @break
                                        @default
                                    @endswitch
                            </div>
                            <!--Product Details Right:end-->
                        </div>
                    </div>
                </div>
                <!--Product Details:end-->
            </div>
        </div>
    </section>
    <!--Product Details:end-->

    <!--Product Attr:start-->
    <div class="product-attr border-top custom-box-shadow-s-1-bottom my-5">
        <!--Slider:start-->
        <div class="swiper productAttr">
            <div class="swiper-wrapper">

                <!--Attr Item:start-->
                <div class="swiper-slide">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <p class=" fs-8 gray-500">
                            <img src="{{asset('user-assets/img/support%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                            24 ساعته، 7 روز هفته
                        </p>
                    </div>
                </div>
                <!--Attr Item:end-->

                <!--Attr Item:start-->
                <div class="swiper-slide">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <p class=" fs-8 gray-500">
                            <img src="{{asset('user-assets/img/days-return%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                            هفت روز ضمانت بازگشت کالا
                        </p>
                    </div>
                </div>
                <!--Attr Item:end-->

                <!--Attr Item:start-->
                <div class="swiper-slide">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <p class=" fs-8 gray-500">
                            <img src="{{asset('user-assets/img/express-delivery%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                            امکان تحویل اکسپرس
                        </p>
                    </div>
                </div>
                <!--Attr Item:end-->

                <!--Attr Item:start-->
                <div class="swiper-slide">
                    <div class="brands-item d-flex justify-content-center align-items-center">
                        <p class=" fs-8 gray-500">
                            <img src="{{asset('user-assets/img/original-products%20(1).svg')}}" alt="" title="" class="img-fluid p-3">
                            ضمانت اصل بودن کالا
                        </p>
                    </div>
                </div>
                <!--Attr Item:end-->

            </div>
        </div>
        <!--Slider:end-->
    </div>
    <!--    Product Attr:end-->

    <!--Product Tabs:start-->
    <section class="product-tabs mt-5">
        <ul class="nav nav-tabs">
            <li class="nav-item fs-7">
                <a class="nav-link active custom-link" href="#attributes" data-bs-toggle="tab">
                مشخصات
                </a>
            </li>
            <li class="nav-item fs-7">
                <a class="nav-link custom-link" href="#productCheckExpert" data-bs-toggle="tab">
                بررسی تخصصی
                </a>
            </li>
            <li class="nav-item fs-7">
                <a class="nav-link custom-link" href="#comments" data-bs-toggle="tab">
                دیدگاه ها
                </a>
            </li>
        </ul>
        <div class="tab-content p-3">
            
            <!--Product Info:start-->
            <div class="tab-pane fade show active" id="attributes">
                <h2 class="fs-5 mb-3">مشخصات</h2>
                {!!$product->description!!}
            </div>
            <!--Product Info:end-->

            <!--Product Check Expert:start-->
            <div class="tab-pane fade" id="productCheckExpert">
                <div class="product-check-item mb-3">
                    <h2 class="fs-5">طراحی آشنا و مناسب</h2>
                    <div class="product-check-item-img">
                        {!!$product->review!!}
                    </div>
                </div>
            </div>
            <!--Product Check Expert:end-->

            <!--Product Comments:start-->
            <div class="tab-pane fade" id="comments">
                <h2 class="fs-5">نظرات کاربران</h2>
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mb-3">
                        <div class="product-score">
                            <!--Product Stars:start-->
                            <div class="stars">
                                <!--Product Insert New Comment:start-->
                                <div class="mt-2 customer-comment">
                                    @if (Auth::guard('web')->check())
                                        <p class="fs-8">شما هم دیدگاه خود را ثبت کنید.</p>
                                        <div class="d-grid gap-2 mt-3">
                                            <a href="" class="btn btn-outline-primary fs-8" data-bs-toggle="modal" data-bs-target="#insertCommentModal">ثبت دیدگاه</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="insertCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">دیدگاه شما
                                                                <span class="d-block fs-7">در مورد {{$product->title}}</span>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($errors->any())
                                                                @foreach ($errors->all() as $error)
                                                                    <div class="alert alert-danger text-center">{{$error}}</div>
                                                                @endforeach
                                                            @endif
                                                            <form method="POST" action="{{route('Comment.store')}}">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <div class="mb-3">
                                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                            <label class="form-label">متن نظر :</label>
                                                                            <textarea type="text" name="comment" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="gap-2 border-top pt-2">
                                                                    <button class="btn custom-btn-danger" type="submit" >ثبت</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="fs-8 text-danger">برای ثبت دیدگاه ابتدا وارد سایت شوید.</p>
                                    @endif
                                    
                                </div>
                                <!--Product Insert New Comment:end-->
                            </div>
                            <!--Product Stars:end-->
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                        <!--Comments Order:start-->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            @if (count($comments) > 0)
                                <p class="count-of-comments fw-bold">
                                    {{count($comments)}} دیدگاه
                                </p>
                            @else
                                <p class="count-of-comments fw-bold">
                                     دیدگاهی وجود ندارد.
                                </p>
                            @endif
                        </div>
                        <!--Comments Order:end-->
                        @if ($comments)
                            @foreach ($comments as $comment)
                                <!--Comments:start-->
                                <div class="comment-box mb-3">
                                    <div class="comment-title">
                                        <!--Comment text:start-->
                                        <p class="fw-bold">
                                            {{$comment->comment}}
                                        </p>
                                        <!--Comment text:end-->
                                    </div>
                                    <div class="comment-details my-3 border-bottom-gray-150 pb-3">
                                        <i class="fa fa-circle fs-11 gray-400"></i>
                                        @if ($comment->user->first_name)
                                            <span class="fs-8 gray-600">{{$comment->user->first_name.' '.$comment->user->last_name}}</span>
                                            @else
                                            <span class="fs-8 gray-600">{{$comment->user->id}}کاربر</span>
                                        @endif
                                        <span class="fs-8 gray-600"><?php echo verta($comment->created_at)->format('Y/m/d');?></span>
                                    </div>
                                </div>
                                <!--Comments:end-->
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!--Product Comments:end-->
        </div>
    </section>
    <!--Product Tabs:end-->

     <!--Similar Products:start-->
    {{-- <section class="similar-products border-radius-3xl border border-gray-300 mt-4 pb-4">
        <!--        Section Title:start-->
        <h2 class="my-4 section-title fs-5 ms-4">
            محصولات مشابه
        </h2>
        <!--        Section Title:end-->

        <!--            Slider:start-->
        <div class="swiper similarSlider">
            <div class="swiper-wrapper">

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/single-product-1.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/laptop-1.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/laptop-3.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/laptop-2.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/laptop-4.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/single-product-1.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

                <!--            Similar Item:start-->
                <div class="swiper-slide position-relative">
                    <div class="similar-item px-2">
                        <img src="assets/img/laptop-3.jpg" alt="" title="" class="img-fluid">
                        <h3 class="fs-7 gray-800 mt-3">خرید لپ تاپ لنوو</h3>
                        <p class="fs-7 gray-900 text-end mt-2">18,000 تومان</p>
                        <a href="" title="" class="stretched-link px-2"></a>
                    </div>
                </div>
                <!--            Similar Item:end-->

            </div>
            <div class="swiper-button-next bg-light border-radius-circle"></div>
            <div class="swiper-button-prev bg-light border-radius-circle"></div>
        </div>
        <!--            Slider:end-->
    </section> --}}
    <!--Similar Products:end-->

</main>
<!--Main:end-->

@endsection