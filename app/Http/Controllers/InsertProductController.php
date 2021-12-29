<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsertProductController extends Controller
{
    public function insert(){
        return view('/insert-product');
    }
}
