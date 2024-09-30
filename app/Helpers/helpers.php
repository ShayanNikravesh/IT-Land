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