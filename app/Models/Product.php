<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function photos(){
        return $this->belongsToMany(Photo::class,'product_photo','product_id','photo_id')->withPivot('sort')->withTimestamps();
    }

    public function colors():BelongsToMany
    {
        return $this->belongsToMany(Color::class,'product_colors')->withPivot('price', 'price_discounted','stock')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // اینجا نام مدل دسته را مشخص کنید
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class); // اینجا نام مدل دسته را مشخص کنید
    }

    public function memory()
    {
        return $this->belongsTo(Memory::class); // اینجا نام مدل دسته را مشخص کنید
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class); // اینجا نام مدل دسته را مشخص کنید
    }
}
