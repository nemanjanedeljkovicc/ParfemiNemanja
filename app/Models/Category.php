<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function index()
    {
        return $this->belongsToMany(Perfume::class, 'category_perfume', 'category_id', 'parfem_id');
    }
}

