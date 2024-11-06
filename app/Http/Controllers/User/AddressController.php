<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
        }
        $addresses = Address::with('city')->where('user_id',$user_id)->get();
        $provinces = Province::all();
        $title = 'حذف آدرس!';
        $text = "آیا از حذف این آدرس اطمینان دارید؟";
        confirmDelete($title, $text);
        return view('user.address.index',compact('provinces','addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
        }

        $request -> validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'city' => ['required','numeric'],
            'post_code' => ['required'],
            'mobile' => ['required','numeric'],
            'address' => ['required'],
        ]);

        $address = new Address();
        $address->user_id = $user_id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->city_id = $request->city;
        $address->post_code = $request->post_code;
        $address->mobile = $request->mobile;
        $address->address = $request->address;
        $address->save();

        Alert::success('عملیات موفق', 'آدرس گیرنده ثبت شد.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
        }

        $request -> validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'post_code' => ['required'],
            'mobile' => ['required','numeric'],
            'address' => ['required'],
        ]);

        $address = Address::where('user_id',$user_id)->where('id',$id)->firstOrFail();
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        if ($request->filled('city')) {
            $address->city_id = $request->city;
        }
        $address->post_code = $request->post_code;
        $address->mobile = $request->mobile;
        $address->address = $request->address;
        $address->save();

        Alert::success('عملیات موفق', 'آدرس ویرایش شد.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
        }

        $address = Address::where('id',$id)->where('user_id',$user_id)->first();
        
        if($address){
            $address->forceDelete();
            Alert::success('عملیات موفق', 'آدرس حذف شد.');
            return redirect()->back();
        }

        Alert::error('خطا', 'آدرس یافت نشد.');
        return redirect()->back();

    }

    public function getcities(Request $request)
    {
        $cities = City::where('province_id',$request->province)->get();
        return response()->json($cities);
    }

    public function setDefault(string $id)
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id;
        }

        Address::where('user_id',$user_id)->update(['is_default' => 'no']);

        $address = Address::where('user_id',$user_id)->where('id',$id)->firstOrFail();
        $address->is_default = 'yes';
        $address->save();

        Alert::success('عملیات موفق', 'آدرس به عنوان پیش فرض انتخاب شد.');
        return redirect()->back();
    }
}
