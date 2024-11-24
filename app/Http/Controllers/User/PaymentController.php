<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddressOrder;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductOrder;
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

    //payment blade
    public function payment()
    {
        if(Auth::guard('web')->check()){

            $cart_products = CartFacade::getContent();
            if(count($cart_products) < 1){
                Alert::error('خطا', 'برای دسترسی به این صفحه سبد خرید نباید خالی باشد.');
                return redirect()->back();
            }

            $user_id = Auth::guard('web')->user()->id;
            $default_address = Address::with('city')->where('user_id',$user_id)->where('is_default','yes')->first();

            if(empty($default_address)){
                Alert::error('خطا', 'برای دسترسی به این صفحه باید آدرس پیش فرض داشته باشید.');
                return redirect()->back();
            }

            $total = CartFacade::getSubTotal();
            $totalQuantity = CartFacade::getTotalQuantity();

            return view('user.payment.payment',compact('total','totalQuantity'));
        }

        Alert::error('خطا', 'ابتدا وارد سایت شوید.');
        return redirect()->route('login');
    }

    //payment

    public function paymentrequest(Request $request)
    {
        if(Auth::guard('web')->check()){
            //checking cart
            $cart_products = CartFacade::getContent();
            if(count($cart_products) < 1){
                Alert::error('خطا', 'برای دسترسی به این صفحه سبد خرید نباید خالی باشد.');
                return redirect()->back();
            }

            //checking default address
            $user_id = Auth::guard('web')->user()->id;
            $default_address = Address::with('city')->where('user_id',$user_id)->where('is_default','yes')->first();
            if(empty($default_address)){
                Alert::error('خطا', 'آدرس پیش فرض انتخاب نشده است.');
                return redirect()->back();
            }

            //checking  cart products
            $cart_products = CartFacade::getContent();
            foreach($cart_products as $cart_product){
                list($product_id, $color_id) = explode('-', $cart_product->id);

                //product details
                $product = Product::findorfail($product_id);

                //checking product status
                if($product->status == 'inactive'){
                    CartFacade::remove($cart_product->id);
                    Alert::warning('اعلان','تغییر در سبد خرید.');
                    return redirect()->route('cart');
                }

                //checking stock & quantity
                if($color_id == 0){
                    $stock = $product->stock;
                }else{
                    $color = $product->colors()->where('color_id', $color_id)->first();
                    if($color){
                        $stock = $color->pivot->stock;
                    }else{
                        Alert::error('خطا', 'خطایی رخ داده است.');
                        return redirect()->back();
                    }
                }

                if ($stock < $cart_product->quantity) {
   
                    //updating amount payable
                    if($cart_product->attributes->price_discounted > 0){
                        $amount_payable = session()->get('amount_payable') - (($cart_product->quantity - $product->stock) * $product->price_discounted);
                        session()->put('amount_payable',$amount_payable);
                    }else{
                        $amount_payable = session()->get('amount_payable') - (($cart_product->quantity - $product->stock) * $product->price);
                        session()->put('amount_payable',$amount_payable);
                    }

                    //updating cart
                    CartFacade::update($cart_product->id, array(
                        'quantity' => [
                            'relative'=> false,
                            'value'=> $stock,
                        ],
                    ));

                    Alert::warning('اعلان','تغییر در سبد خرید.');
                    return redirect()->route('cart');
                }
            }

            //create Order
            $code = rand(111111111,999999999);
            $tracking_code = 'O-'.$code;
            $total = CartFacade::getSubTotal();
            $user_id = Auth::guard('web')->user()->id;
            $amount_payable = session()->get('amount_payable');
            //submit cost
            if($amount_payable < 3000000){
                $amount_payable += 70000;
                $submit_cost = 70000;
            }else{
                $submit_cost = 0;
            }
            $mobile = Auth::guard('web')->user()->mobile;

            $order = new Order();
            $order->tracking_code = $tracking_code;
            $order->total_amount = $total;
            $order->user_id = $user_id;
            $order->amount_payable =  $amount_payable;
            $order->submit_cost = $submit_cost;
            $order->save();

            //create payment
            $response = zarinpal()
            ->merchantId(00000000-0000-0000-0000-000000000000) // تعیین مرچنت کد در حین اجرا - اختیاری
            ->amount($amount_payable) // مبلغ تراکنش
            ->request()
            ->description($tracking_code) // توضیحات تراکنش
            ->callbackUrl(route('callback')) // آدرس برگشت پس از پرداخت
            ->mobile($mobile) // شماره موبایل مشتری - اختیاری
            ->send();
            
            if (!$response->success()) {
                return $response->error()->message();
            }

            
            // ذخیره اطلاعات در دیتابیس
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->pay_key = $response->authority();
            $payment->amount_payable = $amount_payable;
            $payment->save();
            


            // هدایت مشتری به درگاه پرداخت
            return $response->redirect();
            
        }

        Alert::error('خطا', 'ابتدا وارد سایت شوید.');
        return redirect()->route('login');

    }

    public function callback(Request $request)
    {

        //checking cart
        $cart_products = CartFacade::getContent();
        if(count($cart_products) < 1){
            Alert::error('خطا', 'برای دسترسی به این صفحه سبد خرید نباید خالی باشد.');
            return redirect()->back();
        }

        //checking default address
        $user_id = Auth::guard('web')->user()->id;
        $default_address = Address::with('city')->where('user_id',$user_id)->where('is_default','yes')->first();
        if(empty($default_address)){
            Alert::error('خطا', 'آدرس پیش فرض انتخاب نشده است.');
            return redirect()->back();
        }

        
        //callback
        $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        $status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        
        //geting Payment
        $payment = Payment::where('pay_key', $authority)->latest()->first();
        // geting Order
        $order = Order::where('id', $payment->order_id)->latest()->first();

        //checking status
        if ($status !='OK'){
            return redirect(route('payment-check',['failed',$order->tracking_code]));
        }

        $amount_payable = session()->get('amount_payable');
         //submit cost
        if($amount_payable < 3000000){
            $amount_payable += 70000;
        }

        $response = zarinpal()
        ->merchantId('00000000-0000-0000-0000-000000000000') // تعیین مرچنت کد در حین اجرا - اختیاری
        ->amount($amount_payable)
        ->verification()
        ->authority($authority)
        ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }


        $payment->payment_track_id = $response->referenceId();
        $payment->status = 'success';
        $payment->save();

        // دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
        // $response->cardHash();

        // دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
        // $response->cardPan();

        // پرداخت موفقیت آمیز بود      
        $order->status = 'success';
        if($order->save()){
            $address = new AddressOrder();
            $address->order_id = $order->id;
            $address->user_id = $user_id;
            $address->first_name = $default_address->first_name;
            $address->last_name = $default_address->last_name;
            $address->mobile = $default_address->mobile;
            $address->postal_code = $default_address->post_code;
            $address->city_id = $default_address->city_id;
            $address->address = $default_address->address;
            if($address->save()){
                $cart_products = CartFacade::getContent();
                foreach($cart_products as $cart_product){
                    list($product_id, $color_id) = explode('-', $cart_product->id);
                    $product = Product::findorfail($product_id);

                    //product stock - minus
                    if($color_id == 0){
                        $product->stock = $product->stock - $cart_product->quantity;
                        $product->save();
                    }else{
                        $color = $product->colors()->where('color_id', $color_id)->first();
                        if($color){
                            $stock = $color->pivot->stock - $cart_product->quantity;
                            $color->pivot->update(['stock' => $stock]);
                        }else{
                            Alert::error('خطا', 'خطایی رخ داده است.');
                            return redirect()->back();
                        }
                    }

                    //create product order
                    $product_order = new  ProductOrder();
                    $product_order->order_id = $order->id;
                    $product_order->product_id = $product_id;
                    $product_order->price = $cart_product->price;
                    $product_order->price_discounted = $cart_product->attributes->price_discounted;
                    $product_order->quantity = $cart_product->quantity;
                    $product_order->color_id = $color_id;
                    $product_order->save();
                }

                //amount payable & ClearCart
                session()->put('amount_payable');
                CartFacade::clear();
                return  redirect(route('payment-check',['success',$order->tracking_code]));
            }
        }else{
            return redirect(route('payment-check',['failed',$order->tracking_code]));
        }

        // دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس
        return $response->referenceId();

    }

    public function paymentcheck($status,$tracking_code){
        $order = Order::where('tracking_code',$tracking_code)->where('user_id',auth('web')->id())->first();
        if (empty($order)){
            abort(404);
        }

        if ($status == 'success' && $order->status == 'success'){
            return view('user.payment.payment-successfull',compact('order'));
        }
        elseif ($status == 'failed' && $order->status == 'failed'){
            return view('user.payment.payment-unsuccessfull',compact('order'));
        }
        else{
            abort(404);
        }
    }


}
