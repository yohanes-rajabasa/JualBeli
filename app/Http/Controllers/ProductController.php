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
            "sort_type"=>'in:name,price',
            "sort_order"=>'in:asc,desc'
        ];

        $request->validate($validation);

        $message = '';

        if(request('sort_type') && request('sort_order')){
            $sortBy = $request->sort_type;
            $sortOrder = $request->sort_order;
            $message = "Sorted by: ".$request->sort_type.", ".$request->sort_order;
        } else {
            $sortBy = 'name';
            $sortOrder = 'asc';
        }

        $products = Product::where('name','LIKE','%'.$request->search_query.'%')->orderBy($sortBy,$sortOrder)->paginate(20)->withQueryString();

        return view('search')
            ->with('products',$products)
            ->with("query",$request->search_query)
            ->with('message', $message);
        
    }

    public function insertProductView(){
        return view('/insert-product');
    }

    public function insertProduct(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'price' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0'],
            'description' => ['required', 'min:10'],
            'image' => ['required', 'file', 'image' ],
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
    
    public function deleteProduct ($id){
        $product = Product::find($id);
        $image_path = $product->picture_path;
        Product::destroy($product->id);
        Storage::delete('public/'.$image_path);
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
            'quantity' => ['required', 'min:0'],
            'description' => ['required', 'min:10'],
            'image' => ['nullable', 'image'],
        ]);
        
        $product = Product::find($id);

        $validateData['desc'] = Str::limit($request->description, 200);
        
        $product->name = $validateData['name'];
        $product->price = $validateData['price'];
        $product->desc = $validateData['desc'];
        $product->stock = $validateData['quantity'];
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/product',$file,$imageName);
            $imagePath = 'product/'.$imageName;
            Storage::delete('public/'.$product->picture_path);
            $validateData['picture_path'] = $imagePath;
            $product->picture_path = $validateData['picture_path'];
        }
        
        $product->save();
    
        return redirect()->back()->with('success', 'New product has been updated!');
    }
}
