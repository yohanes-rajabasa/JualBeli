<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartTransactionController extends Controller
{
    //
    public function index(Request $request){
        $carts = Cart::all();
        return view('cart-transaction',['carts'=>$carts]);
    }
    public function ajax(Request $request){
        echo($request->ajax);
    }
}
