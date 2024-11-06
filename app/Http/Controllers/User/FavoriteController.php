<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FavoriteController extends Controller
{
    public function favorites()
    {
        $user_id = Auth::guard('web')->user()->id;
        $favorites = Favorite::with(['product.photos'=> function($query) {$query->orderBy('sort')->take(1);}])->where('user_id',$user_id)->get();
        return view('user.favorite.favorites',compact('favorites'));
    }

    public function add(string $id)
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
            $product = Product::findOrFail($id);
            if($product){
                $favorite = new Favorite;
                $favorite->user_id = $user_id;
                $favorite->product_id = $id;
                $favorite->save();

                Alert::success('عملیات موفق', 'محصول به لیست مورد علاقه ها شد.');
                return redirect()->back();
            }
            
        }else{
            
            Alert::warning('ابتدا وارد سایت شوید.');

            return redirect()->back();
        }
    }

    public function delete(string $id)
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
            $product = Product::findOrFail($id);
            if($product){
                $favorite = Favorite::where('user_id',$user_id)->where('product_id', $id)->first();
                $favorite->forceDelete();

                Alert::success('عملیات موفق', 'محصول از لیست مورد علاقه ها حذف شد.');

                return redirect()->back();
            }else{
                Alert::error('خطا', 'محصول یافت نشد.');

                return redirect()->back();
            }
            

        }else{
            
            Alert::warning('ابتدا وارد سایت شوید.');

            return redirect()->back();
        }
    }
}
