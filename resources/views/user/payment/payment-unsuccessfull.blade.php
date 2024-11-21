@extends('user.layouts.master')

@section('content')

<div class="container mt-xxxx-large">
    <div class="row">
        <div class="col-8 offset-2">
            <!--Failed To Payment:start-->
            <div class="payment-status border border-radius-2xl px-4">
                <div class="payment-header mt-4">
                    <div class="row">
                        <div class="col-12 col-lg-8 order-2 order-lg-1">
                            <h2 class="fs-5 text-danger fw-bold">
                                متاسفانه پرداخت شما ناموفق بود!
                                <span class="d-block fw-lighter fs-7 gray-600 mt-3">شماره سفارش {{$order->tracking_code}}</span>
                            </h2>
                        </div>
                        <div class="col-12 col-lg-4 order-1 order-lg-2 payment-status-img">
                            <img src="{{asset('user-assets/img/Fail.svg')}}" alt="" class="float-end">
                        </div>
                    </div>
                </div>

                <div class="payment-details mt-5 mb-2">
                    <a href="" class="btn custom-btn-danger border-radius-xl me-3">پرداخت دوباره</a>
                    <a href="{{route('cart')}}" class="text-danger">تغییر روش پرداخت</a>
                </div>
            </div>
            <!--Failed To Payment:end-->

            <!--Failed To Payment Info:start-->
            <div class="failed-to-payment-info border border-radius-2xl mt-3 p-3">
                <p class="gray-600 fs-7">
                    <i class="fa fa-info-circle"></i>
                    چنانچه مبلغی از حساب شما کسر شده است، تا ۲۴ ساعت آینده به حساب شما باز خواهد گشت.
                </p>
                <p class="my-3 fw-bold">
                    جزئیات پرداخت
                </p>


                <div class="payment-table">
                    <div class="col-12">
                        <table class="table">
                            <thead>
                            <tr class="gray-500">
                                <th scope="col" class="fw-lighter">درگاه</th>
                                <th scope="col" class="fw-lighter">شماره پیگیری</th>
                                <th scope="col" class="fw-lighter">تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="fs-8">
                                <th scope="row">سامان</th>
                                <td>1586378</td>
                                <td>14 فروردین 1401</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--Failed To Payment Info:end-->
        </div>
    </div>
</div>

@endsection()