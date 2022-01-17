<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        // redirect if seller
        if(Auth::user()->role_number == 2){
            return redirect('/seller');
        }

        //temp
        $products['popular'] = Product::withCount('details')->orderBy('details_count','desc')->take(8)->get();
        $products['random'] = Product::inRandomOrder()->take(8)->get();
        $products['secondhand'] = Product::take(8)->get(); //blom ada kategori secondhand

        return view('home')->with('products', $products);
    }
}
