<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function showProductDetail($id){
        $data['productData'] = Product::find($id);
        $data['discussionData'] = DB::table('discussions')
                                    ->select('discussions.*','users.name as name', 'users.picture_path as picture')
                                    ->join('users','discussions.user_id','=','users.id')
                                    ->where('discussions.product_id','=',$id)
                                    ->get();
        return view('product-detail')->with($data);
        // dd($data['discussionData']);
    }

    public function createNewThreads(Request $request){
        Discussion::create([
            'date' => date("Y-m-d"),
            'msg' => $request->msg,
            'product_id' => $request->product_id,
            'parent_id' => $request->parent_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function replyThreads(Request $request){
        //...
    }
}
