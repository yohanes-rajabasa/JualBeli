<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function details(){
        return $this->hasMany(Detail::class);
    }
}
