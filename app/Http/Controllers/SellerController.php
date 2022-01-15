<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function sellerPageView(){
        $products = Product::all();
        return view('/seller-page',['products'=>$products]);
    }
    
    
}
