<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
