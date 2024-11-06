<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ],[
            'email.required'=>'وارد کردن ایمیل الزامی است.',
            'email.email'=>'ایمیل را به درستی وارد کنید.',
            'password.required'=>'وارد کردن رمز الزامی است.',
            'password.min'=>'رمز باید حداقل 6 کاراکتر باشد.'
        ]);

        $manager = Manager::where('email',$request->email)->first();

        if(!empty($manager)){
            if($manager->status == 'active'){
                if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                    //save time
                    $manager = Manager::find(auth('admin')->id());
                    $manager->last_login_at = now(); // یا CarbonCarbon::now();
                    $manager->save();
                    Alert::success('عملیات موفق.', 'خوش آمدید.');
                    return redirect()->route('admin-index');
                }
            }
            return back()->withErrors([
                'message'=> 'حساب شما غیر فعال شده است.'
            ]);
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز ورورد اشتباه است.',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login-form');
    }
}
