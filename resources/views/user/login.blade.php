<!DOCTYPE html>
<html dir="rtl" lang="fa">
<!--Head::start-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>فروشگاه آیتی لند</title>

    <!--    Bootstrap 5 RTL-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/bootstrap/bootstrap.rtl.css')}}">
    <!--    Fontawesome 5-->
    <link rel="stylesheet" href="{{asset('user-assets/css/vendors/fontawesome/fontawesome.min.css')}}">
    <!--    Main Styles-->
    <link rel="stylesheet" href="{{asset('user-assets/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('user-assets/img/Logo/iconco.ico')}}" />
</head>
<!--Head::end-->

<!--Body::start-->
<body>

@include('sweetalert::alert')

<div class="action-wrapper d-flex justify-content-center align-items-center h-100">
    <div class="form p-4 border border-radius-3xl border-gray-200">
        <img src="{{asset('user-assets/img/Logo/logo.png')}}" alt="" title="" class="mx-auto d-block w-50">
        <div class="form-info text-right my-3">
            <h1 class="fw-bold fs-5">ورود | ثبت نام</h1>
            <div class="form-info-text my-4 gray-600">
                <p class="fs-7">سلام!</p>
                <p class="fs-7">لطفا شماره موبایل خود را وارد کنید.</p>
            </div>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center">{{$error}}</div>
            @endforeach
        @endif
        <form action="{{route('user-login')}}" method="POST">
            @csrf
            <input type="text" name="mobile" class="form-control border-radius-xl ltr">
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary btn-block border-radius-xl fw-bold">ورود</button>
            </div>
        </form>
        <p class="text-center mt-3 gray-600 fs-7">ورود شما به معنای پذیرش شرایط و قوانین آیتی لند است.</p>
    </div>
</div>
</body>
<!--Body::end-->

</html>