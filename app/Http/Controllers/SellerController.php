<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDO;

class SellerController extends Controller
{
    public function sellerPageView(){
        $products = Product::all();
        return view('/seller-page',['products'=>$products]);
    }
    
    public function insertProductView(){
        return view('/insert-product');
    }

    public function insertProduct(Request $request)
    {

        
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'price' => ['required', 'min:0'],
            'description' => ['required', 'string'],
            'quantity' => ['required', 'min:0']
        ]);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/images',$file,$imageName);
            $imagePath = 'images/'.$imageName;
            $validateData['picture_path'] = $imagePath;
        }

        $validateData['picture_path'] = "";

        Product::create($validateData);

        return redirect()->back();
    }

    public function deleteProduct ($id){
        $products = Product::find($id);

        Storage::delete('public/'.$products->picture_path);
        $products->delete();

        return redirect()->back();
    }
}
