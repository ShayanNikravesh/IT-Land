@extends('admin.layouts.master')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-2">
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">مدیریت تصاویر</h5>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">در این بخش می توانید تصویر مقاله مورد نظر را مدیریت کنید.</span>
            </div>
            <div class="d-flex align-items-center">
                <!--begin::Daterange-->
                    <span class="text-muted font-size-base font-weight-bold mr-2">تاریخ:</span>
                    <span class="text-primary font-size-base font-weight-bolder"><?php echo verta()->format('Y/m/d');?></span>
                <!--end::Daterange-->
            </div>
        </div>
    </div>
    
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <form method="post" enctype="multipart/form-data" action="{{route('store_article_photo',$article_id)}}">
                @method('PUT')
                @csrf
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <h3 class="card-title">آپلود تصاویر</h3>
                    </div>
                    <div class="card-body">
                        <input id="input_article_id" type="hidden" value="{{$article_id}}">
                        <div class="dropzone dropzone-default dropzone-success" id="upload_article_photo">
                            <div class="dropzone-msg dz-message needsclick">
                                <h3 class="dropzone-msg-title">برای آپلود فایل یا به اینجا بکشید یا کلیک کنید.</h3>
                                <span class="dropzone-msg-desc">حجم تصاویر بنر حداکثر باید 1 مگابایت باشد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">مدیریت تصاویر</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if ($article_photos)
                            @foreach ($article_photos->photos as $photo)
                            <div class="col-lg-2 text-center" id="photo{{$photo->id}}">
                                <label for="">«{{++$loop->index}}»</label>
                                <br>
                                <div class="image-input image-input-outline">
                                    <div class="image-input-wrapper" style="background-image: url('{{asset($photo->src)}}');"></div>
                                    <a class="btn btn-hover-icon-danger" href="{{route('photo.destroy',$photo->id)}}" method="POST" data-toggle="tooltip" data-placement="bottom" title="حذف عکس" data-confirm-delete="true">
                                        <i class="fa fa-trash"></i></button>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection