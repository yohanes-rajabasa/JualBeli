<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartTransactionController extends Controller
{
    //
    public function index(Request $request){
        if($request->ajax){
            return view('cart-transaction')->with('ajax',1);
        }
        return view('cart-transaction')->with('ajax',0);
    }
    public function ajax(Request $request){
        echo($request->ajax);
    }
}
