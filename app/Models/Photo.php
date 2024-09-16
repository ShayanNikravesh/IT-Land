<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function banner(){
        return $this->belongsToMany(Banner::class,'banner_photo','photo_id','banner_id');
    }
}
