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
        <img src="{{asset('user-assets/img/logo/logo.png')}}" alt="" title="" class="mx-auto d-block w-50">
        <a href="{{route('login')}}"><i class="fa fa-arrow-right position-absolute"></i></a>
        <div class="form-info text-right my-3">
            <h1 class="fw-bold fs-5">کد تایید را وارد کنید.</h1>
            <div class="form-info-text my-4 gray-600 fs-7">
                {{-- <p>
                    حساب کاربری با شماره 09305468874 وجود ندارد، برای ساخت حساب جدید کد ارسال شده را وارد نمایید.
                </p> --}}
            </div>
        </div>
        <form action="{{route('Verify',$token)}}" method="POST">
            @csrf
            <div class="enter-code d-flex justify-content-between align-items-center ltr">
                <input type="text" name="otp_code" class="form-control border-radius-xl ltr">
            </div>
            <div class="send-box pt-4">
                <a href="{{route('Resend_otp_code',$token)}}" id="resend" class="btn btn-warning btn-block border-radius-xl fw-bold" style="display: none">ارسال مجدد</a>
                <a href="javascripts:;" class="text-dark" id="timer"></a>
            </div>
            <br>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary btn-block border-radius-xl fw-bold">ورود</button>
            </div>
        </form>
    </div>
</div>

<!--Confirm Code Script(only for this page-->
<script src="{{asset('user-assets/js/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('user-assets/js/confirm-code.js')}}"></script>

<script>
    let count = new Date().getTime() + {{ $timer }};
    let timer = document.getElementById('timer');
    let resend = document.getElementById('resend');
    let timerX = setInterval(function (){
        let now = new Date().getTime();
        let Dis = count - now;
        let minutes = Math.floor((Dis % (1000 * 60 * 60)) / (1000 * 60));
        let second  = Math.floor((Dis % (1000 * 60)) / (1000));
        if(second < 0){
            clearInterval(timerX);
            document.getElementById('timer').style.display = 'none';
            document.getElementById('resend').style.display = 'block';
        }
        else if (minutes == 0){
            document.getElementById('timer').innerHTML =  'زمان باقی مانده تا ارسال مجدد کد: ' + '00:' + second
        }else{
            document.getElementById('timer').innerHTML = 'زمان باقی مانده تا ارسال مجدد کد: ' + minutes + ':' + second 
        }
    }, 1000);


</script>

</body>
<!--Body::end-->

</html>