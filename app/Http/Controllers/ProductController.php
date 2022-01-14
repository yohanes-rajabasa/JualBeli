<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function search(Request $request){
        $validation = [
            "search_query"=>'required',
        ];

        $request->validate($validation);

        $products = Product::where('name','LIKE','%'.$request->search_query.'%')->orderBy('name','asc')->paginate(20);

        return view('search')
            ->with('products',$products)
            ->with("query",$request->search_query);
        
    }
}
