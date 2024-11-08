<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function shipping()
    {
        if(Auth::guard('web')->check()){

            $cart_products = CartFacade::getContent();
            if(count($cart_products) < 1){
                Alert::error('خطا', 'برای دسترسی به این صفحه سبد خرید نباید خالی باشد.');
                return redirect()->back();
            }

            $total = CartFacade::getSubTotal();
            $totalQuantity = CartFacade::getTotalQuantity();

            $user_id = Auth::guard('web')->user()->id;
            $default_address = Address::with('city')->where('user_id',$user_id)->where('is_default','yes')->first();

            return view('user.payment.shipping',compact('cart_products','default_address','total','totalQuantity'));
        }

        Alert::error('خطا', 'ابتدا وارد سایت شوید.');
        return redirect()->back();
    }
}
