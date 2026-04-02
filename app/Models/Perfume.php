<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'picture', 'price', 'discount_price', 'rating','ml','brand_id','top_sell'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_perfume','perfume_id','category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
