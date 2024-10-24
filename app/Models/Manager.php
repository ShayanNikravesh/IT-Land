<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use HasFactory;

    public function photos(){
        return $this->belongsToMany(Photo::class,'manager_photo','manager_id','photo_id');
    }
}
