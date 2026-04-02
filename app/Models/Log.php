<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['message','user_id','created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
