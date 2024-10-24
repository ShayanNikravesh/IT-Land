<?php

use App\Models\Manager;

function FetchStatus ($status){
    switch ($status) {
        case 'active':
            return 'فعال';
        case 'inactive':
            return 'غیرفعال';
        case 'unavailable':
            return 'ناموجود';
        case 'stop_selling':
            return 'توقف فروش';
        case'banned':
            return 'مسدود';    
        case 'success':
            return 'موفق';
        case 'failed':
            return 'ناموفق';
        default:
            return "نامشخص";
        case '0':
            return 'کاربر';
        case '1':
            return 'مدیر';
        case '2':
            return 'اپراتور';
    }
}

function FetchLevel($level){
    switch ($level){
        case 'manager':
            return 'مدیر';
        case 'operator':
            return 'اپراتور';    
    }
}

function generateRandomDigit ($length = 8):int
{
    $intMin = (10 ** $length) / 10; // 100...
    $intMax = (10 ** $length) - 1;  // 999...

    $codeRandom = mt_rand($intMin, $intMax);

    return $codeRandom;
}

function priceFormatter($price) {
    return number_format($price) . ' تومان';
}

function getpercent($value){
    if ($value['price']==0 || $value['price_discounted']==0){
        return false;
    }
    return round( (($value['price']-$value['price_discounted']) / $value['price_discounted']) * 100 );
}

function getPhoto($id){
    $manager = Manager::find($id);
    $existing_photo = $manager->photos()->first();
    return $existing_photo->src;
}