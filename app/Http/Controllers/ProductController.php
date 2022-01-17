<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

    public function insertProductView(){
        return view('/insert-product');
    }

    public function insertProduct(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'price' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0']
        ]);
        
        $validateData['picture_path'] = "";
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/product',$file,$imageName);
            $imagePath = 'product/'.$imageName;
            $validateData['picture_path'] = $imagePath;
        }
        
        $validateData['user_id'] = auth()->user()->id;
        $validateData['desc'] = Str::limit($request->description, 200);
        
        $product =  new Product;
        $product->name = $validateData['name'];
        $product->price = $validateData['price'];
        $product->desc = $validateData['desc'];
        $product->stock = $validateData['quantity'];
        $product->picture_path = $validateData['picture_path'];
        $product->user_id = $validateData['user_id'];
        
        $product->save();
        
        return redirect()->back()->with('success', 'New product has been added!');
    }
    
    public function deleteProduct (Product $product){
        
        Storage::delete('public/'.$product->picture_path);
        Product::destroy($product->id);
        return redirect()->back()->with('success','Post');
    }
    
    public function updateProductView($id){
        $product = Product::where('id','=',$id)->first();
        return view('update-product')->with('product',$product);
    }
    
    public function updateProduct(Request $request){
        $id = $request->id;
        
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'price' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0']
        ]);
        
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/product',$file,$imageName);
            $imagePath = 'product/'.$imageName;
            Storage::delete('public/'.$product->picture_path);
            $validateData['picture_path'] = $imagePath;
        }
        
        $validateData['user_id'] = auth()->user()->id;
        $validateData['desc'] = Str::limit($request->description, 200);
        
        $product->name = $validateData['name'];
        $product->price = $validateData['price'];
        $product->desc = $validateData['desc'];
        $product->stock = $validateData['quantity'];
        $product->picture_path = $validateData['picture_path'];
        $product->user_id = $validateData['user_id'];
        
        $product->save();
    
        return redirect()->back()->with('success', 'New product has been updated!');
    }
}