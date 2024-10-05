<?php
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
            return 'نویسنده';
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