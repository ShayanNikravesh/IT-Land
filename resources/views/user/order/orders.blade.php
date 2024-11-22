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

                        <!--User Panel Orders:start-->
                        <div class="user-panel-orders border border-radius-xl p-3 mb-3 mt-3">
                            <p class="fw-bold mb-4">
                                تاریخچه سفارشات
                            </p>

                            @if (count($orders) > 0)
                                <!--Orders Table:start-->
                                <table id="ordersTable" class="display responsive nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                                style="width: 33px;">
                                                #
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending" style="width: 112px;">
                                                کد سفارش
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                aria-label="Office: activate to sort column ascending" style="width: 99px;">
                                                تاریخ ثبت سفارش
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                aria-label="Age: activate to sort column ascending" style="width: 41px;">
                                                مبلغ پرداختی
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                aria-label="Start date: activate to sort column ascending" style="width: 88px;">
                                                وضعیت سفارش
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 75px;">
                                                جزئیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="odd">
                                                <td class="sorting_1">{{++$loop->index}}</td>
                                                <td>{{$order->tracking_code}}</td>
                                                <td><?php echo verta($order->created_at)->format('Y/m/d');?></td>
                                                <td>{{priceFormatter($order->amount_payable)}}</td>
                                                <td>
                                                    @switch($order->status)
                                                        @case('success')
                                                            <span class="badge bg-warning">ثبت شده</span>
                                                        @break
                                                        @case('failed')
                                                            <span class="badge bg-danger">ناموفق</span>
                                                        @break
                                                        @case('sending')
                                                            <span class="badge bg-primary">در حال ارسال</span>
                                                        @break 
                                                        @case('done')
                                                            <span class="badge bg-success">تحویل داده شده</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('order-details',$order->id)}}" class="btn custom-btn-success custom-box-shadow-s-3">
                                                        <i class="fa fa-angle-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">#</th>
                                        <th rowspan="1" colspan="1">شماره سفارش</th>
                                        <th rowspan="1" colspan="1">تاریخ ثبت سفارش</th>
                                        <th rowspan="1" colspan="1">مبلغ پرداختی</th>
                                        <th rowspan="1" colspan="1">وضعیت سفارش</th>
                                        <th rowspan="1" colspan="1">جزئیات</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--Orders Table:end-->
                            @else
                                <div class="text-center my-5">
                                    <img src="{{asset('user-assets/img/order-empty.svg')}}" alt="">
                                    <p class="fs-8">هنوز هیچ سفارشی ندارید.</p>
                                </div>    
                            @endif
                            
                        </div>
                        <!--User Panel Orders:end-->
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