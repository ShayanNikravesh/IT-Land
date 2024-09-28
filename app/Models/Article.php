<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function photos(){
        return $this->belongsToMany(Photo::class,'article_photo','article_id','photo_id')->withTimestamps();
    }

}
