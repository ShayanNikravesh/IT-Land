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

    public function product(){
        return $this->belongsToMany(Product::class,'product_photo','photo_id','product_id')->withPivot('sort')->withTimestamps();
    }

    public function article(){
        return $this->belongsToMany(Article::class,'article_photo','photo_id','article_id')->withTimestamps();
    }

    public function manager(){
        return $this->belongsToMany(Manager::class,'manager_photo','photo_id','manager_id');
    }

}
