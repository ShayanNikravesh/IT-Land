<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function photos(){
        return $this->belongsToMany(Photo::class,'banner_photo','banner_id','photo_id');
    }
}
