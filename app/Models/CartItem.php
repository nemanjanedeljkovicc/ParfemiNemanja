<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['user_id', 'perfume_id', 'quantity'];

    public function perfume()
    {
        return $this->belongsTo(Perfume::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
