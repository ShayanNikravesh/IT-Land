<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressOrder;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function Orders($status)
    {
        $orders = Order::where('status',$status)->get();
        return view('admin.order.index',compact('orders'));
    }

    public function Order(string $id)
    {
        $order = Order::with(['products.photos'=> function($query) {$query->orderBy('sort')->take(1);}])->where('id',$id)->first();

        if(!empty($order)){
            $address = AddressOrder::where('order_id',$id)->first();
            return view('admin.order.order-details',compact('order','address'));
        }

        Alert::error('خطا','سفارش یافت نشد.');
        return redirect()->back();
    }

    public function ChangeStatus(string $id)
    {

        $order = Order::findOrFail($id);

        switch ($order->status) {
            case 'success':
                $status = 'sending';
                break;
            case 'sending':
                $status = 'done';
                break;
            case 'done':
                Alert::warning('توجه','سفارش تکمیل شده است.');
                return redirect()->back();
                break;    
            default:
                break;
        }

        $order->status = $status;
        $order->save();

        Alert::success('عملیات موفق','وضعیت سفارش تغییر کرد.');
        return redirect()->back();
    }

    public function payments()
    {
        $payments = Payment::where('status','success')->get();
        return view('admin.payment.index',compact('payments'));
    }
}
