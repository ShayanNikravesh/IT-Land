<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddressOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function orders()
    {
        $user_id = Auth::guard('web')->user()->id;
        $orders = Order::where('user_id',$user_id)->get();
        return view('user.order.orders',compact('orders'));
    }

    public function order(string $id)
    {
        $user_id = Auth::guard('web')->user()->id;
        $order = Order::with(['products.photos'=> function($query) {$query->orderBy('sort')->take(1);}])->where('id',$id)->where('user_id',$user_id)->first();

        if(!empty($order)){
            $address = AddressOrder::where('order_id',$id)->where('user_id',$user_id)->first();
            return view('user.order.order-details',compact('order','address'));
        }

        Alert::error('خطا','سفارش یافت نشد.');
        return redirect()->back();
    }
}
