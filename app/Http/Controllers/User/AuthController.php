<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login(Request $request)
    {   
        $request -> validate([
            'mobile' => ['required','regex:/^(\+98|98|0)9\d{9}$/'],
        ],[
            'mobile.required'=>'لطفا شماره موبایل را وارد کنید.',
            'mobile.regex'=>'لطفا شماره را درست وارد کنید.'
        ]);

        $user_id = User::where('mobile',$request->mobile)->value('id');

        if(empty($user_id)){
            $new_user = new User();
            $new_user->mobile = $request->mobile;
            $new_user->save();
            $user_id =DB::getPdo()->lastInsertId();
        }

        $code = rand(111111,999999);
        $token = sha1(mt_rand());
        $Otp = new Otp();
        $Otp->token = $token;
        $Otp->user_id = $user_id;
        $Otp->otp_code =$code;
        $Otp->mobile = $request->mobile;
        $Otp->save();
        
         //send sms
        session(['OtpMobile' => $request->mobile]);
        // session()->put('Otp_Mobile',$request->mobile);
        return redirect(route('Confirm',$token));

    }

    public function Confirm($token){
        $otp = Otp::where('token',$token)->where('mobile',session()->get('OtpMobile'))->where('used',0)->where('status',0)->where('created_at','>=' ,Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)){
            Alert::error('خطا', 'این صفحه منسوخ شده است.');
            return redirect()->back();
        }
        $timer = ((new Carbon($otp->created_at))->addMinute(2)->timestamp - Carbon::now()->timestamp) * 1000;
        return view('user.verify',compact('token','timer'));

    }

    public function Verify($token,Request $request){
        $otp = Otp::where('token',$token)->where('mobile',session()->get('OtpMobile'))->where('used',0)->where('status',0)->where('created_at','>=' ,Carbon::now()->subMinute(5)->toDateTimeString())->first();
        if (empty($otp)){
            Alert::error('خطا', 'کد یکبار مصرف منسوخ شده است!');
            return redirect()->back();
        }
        $code = $request->otp_code;

        if ($code != $otp->otp_code){
            Alert::error('خطا', 'کد یکبار مصرف منسوخ شده است!');
            return redirect()->back();
        }
        $otp->used = 1;
        if ($otp->save()){
            $user = User::find($otp->user_id);
            auth()->guard('web')->login($user);
            session()->forget('OtpMobile');
            Alert::success('عملیات موفق.', 'خوش آمدید.');
            return redirect('/');
        }else{
            Alert::error('خطا', 'خطای داخلی رخ داده است.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        Alert::success('عملیات موفق.', 'از سایت خارج شدید.');
        return redirect()->back();
    }
}
