<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartTransactionController extends Controller
{
    //
    public function insertProductToCart(Request $request)
    {
        $cartData = Cart::where([['product_id','=',$request->product_id],['user_id','=',Auth::user()->id]])->first();
        if($cartData == null){
            Cart::insert([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
            ]);
        }
        else{
            $temp = ($request->qty) + ($cartData->qty);
            $productData = Product::find((int)$request->product_id);
            
            if($temp > $productData->stock){
                $temp = $productData->stock;
            }

            $cartData->qty = $temp;
            $cartData->save();
        }
        
        return redirect('/transaction');
    }

    public function createTransaction(Request $request)
    {
        // create new transaction
        Transaction::create([
            'transaction_date' => date('Y-m-d'),
            'user_id' => Auth::user()->id,
        ]);

        // create detail transaction
        $transactionData = Transaction::orderBy('created_at','DESC')->first();
        $productData = Product::where('id','=',$request->product_id)->first();
        Detail::create([
            'product_id' => $request->product_id,
            'transaction_id' => $transactionData->id,
            'product_name' => $productData->name,
            'product_price' => $productData->price,
            'product_desc' => $productData->desc,
            'product_img' => $productData->picture_path,
            'qty' => $request->qty,
        ]);

        //reduce product stock
        $productData = Product::find($request->product_id);
        $tempStock = $productData->stock - $request->qty;
        if ($tempStock < 0) $tempStock = 0;
        $productData->stock = $tempStock;
        $productData->save();

        // redirect to view transaction page
        return redirect('/transaction');
    }

    public function index()
    {
        $carts = Auth::user()->cart;
        $transactions = Auth::user()->transaction;
        return view('cart-transaction', ['carts' => $carts], ['transactions' => $transactions]);
    }
    public function calcPrice(Request $request)
    {
        $testTotal = $request->total;
        $isChecked = $request->value === "true";
        if (!$isChecked) {
            $cart = Cart::find($request->id);
            $testTotal -= ($cart->product->price * $cart->qty);
        } else {
            $cart = Cart::find($request->id);
            $testTotal += ($cart->product->price * $cart->qty);
        }
        $ppn = $testTotal * 15 / 100;
        $grandPrice = $testTotal + $ppn;
        echo (number_format($testTotal, 2, ',', '.') . "#" . number_format($ppn, 2, ',', '.') . "#" . number_format($grandPrice, 2, ',', '.'));
    }
    public function minQuantity(Request $request)
    {
        $total = (int)$request->total;
        $id = (int) $request->id;
        $quantity = (int) $request->qty;
        $cart = Cart::find($id);

        if ($quantity != 1) {
            $cart = Cart::find($id);
            $oldTotal = $cart->qty * $cart->product->price;
            $total -= $oldTotal;

            $cart->qty = $quantity - 1;

            $newTotal = $cart->qty * $cart->product->price;
            $total += $newTotal;

            $cart->save();
        }

        $ppn = $total * 15 / 100;
        $grandPrice = $total + $ppn;

        echo ($id . "#" . number_format($total, 2, ',', '.') . "#" . number_format($ppn, 2, ',', '.') . "#" . number_format($grandPrice, 2, ',', '.'));
    }

    public function addQuantity(Request $request)
    {
        $total = $request->total;
        $id = (int) $request->id;
        $quantity = (int) $request->qty;
        $cart = Cart::find($id);

        if ($quantity < $cart->product->stock) {
            $oldTotal = $cart->qty * $cart->product->price;
            $total -= $oldTotal;

            $cart->qty = $quantity + 1;

            $newTotal = $cart->qty * $cart->product->price;
            $total += $newTotal;

            $cart->save();
        }

        $ppn = $total * 15 / 100;
        $grandPrice = $total + $ppn;
        echo ($id . "#" . number_format($total, 2, ',', '.') . "#" . number_format($ppn, 2, ',', '.') . "#" . number_format($grandPrice, 2, ',', '.'));
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function detailTransaction($id)
    {
        $transaction = Transaction::find($id);
        return view('transaction-detail')->with('transactions', $transaction);
    }


    public function checkout(Request $request)
    {
        $allInput = $request->all();
        $count = count($request->all());
        print_r($allInput);
        if ($count >= 3) {
            $transaction = new Transaction();
            $transaction->transaction_date = date("Y-m-d");
            $transaction->user_id = Auth::user()->id;
            $transaction->save();
            $carts = Auth::user()->cart;
            $count = count($carts);
            // echo ($count);
            for ($i = 1; $i < $count + 1; $i++) {
                if (isset($allInput["inputBox" . $i])) {
                    $cartId = $allInput["inputBox" . $i];
                    echo ("hello" . $i);
                    $cart = Cart::where("id", "=", $cartId)->first();
                    $detail = new Detail();

                    $detail->qty = $cart->qty;
                    $detail->product_id = $cart->product_id;
                    $detail->transaction_id = $transaction->id;
                    
                    $detail->product_name = $cart->product->name;
                    $detail->product_price = $cart->product->price;
                    $detail->product_desc = $cart->product->desc;
                    $detail->product_img = $cart->product->picture_path;
                    
                    $product = $cart->product;
                    $product->stock-= $cart->qty;
                    $product->save();
                    $detail->save();
                    $cart->delete();
                }
            }
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors("You need choose the item first");
        }
    }
}
