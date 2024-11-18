<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function cart()
    {
        $cart_products = CartFacade::getContent();
        $total = CartFacade::getSubTotal();
        $totalQuantity = CartFacade::getTotalQuantity();
        return view('user.cart.cart',compact('cart_products','total','totalQuantity'));
    }

    public function store(string $product_id , string $color_id)
    {
        
        $product = Product::with(['photos' => function($query) {$query->orderBy('sort')->take(1);}])->findOrFail($product_id);
        $photo = $product->photos->first();

        if(empty($photo)){
            $photo_src = 'user-assets/img/box.png';
        }else{
            $photo_src = $photo->src;
        }

        if($color_id == 0){
            $id = $product_id.'-'.'0';
            $price = $product->price;
            $price_discounted = $product->price_discounted;
        }else{
            $color = $product->colors()->where('color_id', $color_id)->first();
            if($color){
                $id = $product_id.'-'.$color_id;
                $price = $color->pivot->price;
                $price_discounted = $color->pivot->price_discounted;
            }else{
                Alert::error('خطا', 'خطایی رخ داده است.');
                return redirect()->back();
            }
        }

        if(!empty(CartFacade::get($id))){
            Alert::warning('این محصول از قبل در سبد خرید موجود است .');
            return redirect()->back();
        }
        

        CartFacade::add(array(
            'id' => $id, // inique row ID
            'name' => $product->title,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'english_title' => $product->english_title,
                'price_discounted' =>$price_discounted,
                'photo' =>$photo_src,
            )
        ));
        
        //amount_payable
        if($price_discounted > 0){
            $amount_payable = !empty(session('amount_payable')) ? session('amount_payable') + $price_discounted : $price_discounted;
            session()->put('amount_payable',$amount_payable);
        }else{
            $amount_payable = !empty(session('amount_payable')) ? session('amount_payable') + $price : $price;
            session()->put('amount_payable',$amount_payable);
        }
        
        Alert::success('عملیات موفق', 'محصول به سبد خرید اضافه شد.');
        return redirect()->back();
        
    }

    public function remove(string $id)
    {
        CartFacade::remove($id);

        Alert::success('عملیات موفق', 'محصول از سبد خرید حذف شد.');

        return redirect()->back();
    }

    public function clear()
    {
        //amount payable : ClearCart
        session()->put('amount_payable');
        CartFacade::clear();

        Alert::success('عملیات موفق', 'سبد خرید خالی شد.');
        return redirect()->back();
    }

    public function Quantity(Request $Request,string $id,string $status)
    {
        if (is_null(CartFacade::get($id))){
            return response()->json(['message' =>'این محصول از قبل در سبد خرید شما موجود نیست.']);
        }

        list($product_id, $color_id) = explode('-', $id);
        
        if ($status === 'plus'){
            
            $product = Product::findorfail($product_id);
            $product_in_cart = CartFacade::get($id);

            //checking stock
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
            
            if ($product->status == 'active' && $stock > ($product_in_cart->quantity+1)){

                //amount payable + plus
                if($product_in_cart->attributes->price_discounted > 0){
                    $amount_payable = $product_in_cart->attributes->price_discounted + session()->get('amount_payable');
                    session()->put('amount_payable', $amount_payable);
                }else{
                    $amount_payable = $product_in_cart->price + session()->get('amount_payable');
                    session()->put('amount_payable', $amount_payable);
                }
                
                $result = CartFacade::update($id, array(
                    'quantity' => 1,
                ));
                return response()->json(['is_plus' => $result]);

            }else{
                return response()->json(['status' => 400]);
            }
            
        }elseif ($status === 'minus'){

            $product = Product::findorfail($product_id);
            $product_in_cart = CartFacade::get($id);

            if ($product->status != 'inactive' && $product_in_cart->quantity > 1){

                //amount payable - minus
                if($product_in_cart->attributes->price_discounted > 0){
                    $amount_payable =  session()->get('amount_payable') - $product_in_cart->attributes->price_discounted;
                    session()->put('amount_payable', $amount_payable);
                }else{
                    $amount_payable =  session()->get('amount_payable') - $product_in_cart->price;
                    session()->put('amount_payable', $amount_payable);
                }
            
                $result = CartFacade::update($id, array(
                    'quantity' => -1,
                ));
                return  response()->json(['is_minus' => $result]);

            }else{

                //amount payable->remove
                if($product_in_cart->attributes->price_discounted > 0){
                    $amount_payable =  session()->get('amount_payable') - $product_in_cart->attributes->price_discounted;
                    session()->put('amount_payable', $amount_payable);
                }else{
                    $amount_payable =  session()->get('amount_payable') - $product_in_cart->price;
                    session()->put('amount_payable', $amount_payable);
                }
                
                $result = CartFacade::remove($Request->id);
                return response()->json(['is_remove' => $result]);
            }
        }
    }

}
