<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    public function photos(){
        return $this->belongsToMany(Photo::class,'info_photo','info_id','photo_id')->withTimestamps();
    }
}
