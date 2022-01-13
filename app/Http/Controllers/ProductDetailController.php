<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function showProductDetail($id){
        $data['productData'] = Product::find($id);
        $data['discussionData'] = DB::table('discussions')
                                    ->join('users','discussions.user_id','=','users.id')
                                    ->where('discussions.product_id','=',$id)
                                    ->get();
        return view('product-detail')->with($data);
    }

    public function createNewThreads(Request $request){
        //...
    }

    public function replyThreads(Request $request){
        //...
    }

    public function buyNow(Request $request){
        //...
    }

}
