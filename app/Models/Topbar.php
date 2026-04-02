<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topbar extends Model
{
    protected $table = "topbar";
    protected $fillable = ['icon', 'name'];
}
