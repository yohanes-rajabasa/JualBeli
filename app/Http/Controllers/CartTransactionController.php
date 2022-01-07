<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\Transaction;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartTransactionController extends Controller
{
    //
    public function index()
    {
        $carts = Auth::user()->cart;
        $transactions = Auth::user()->transaction;
        return view('cart-transaction', ['carts' => $carts], ['transactions' => $transactions]);
    }
    public function calcPrice(Request $request)
    {
        // echo($request->value);
        // echo($request->total);
        $total = (int) $request->total;
        $isChecked = $request->value === "true";
        if (!$isChecked) {
            $cart = Cart::find($request->id);
            $total -= ($cart->product->price * $cart->qty);
        } else {
            $cart = Cart::find($request->id);
            $total += ($cart->product->price * $cart->qty);
        }
        echo ($total);
    }
    public function minQuantity(Request $request)
    {
        $id = (int) $request->id;
        $quantity = (int) $request->qty;
        if ($quantity != 1) {
            $cart = Cart::find($id);
            $cart->qty = $quantity - 1;
            $cart->save();
        }
        echo ($id);
    }

    public function addQuantity(Request $request)
    {
        $id = (int) $request->id;
        $quantity = (int) $request->qty;
        $cart = Cart::find($id);
        if ($quantity < $cart->product->stock) {
            $cart->qty = $quantity + 1;
            $cart->save();
        }
        echo ($id);
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $allInput = $request->all();
        $count = count($request->all());

        $transaction = new Transaction();
        $transaction->transaction_date = date("Y-m-d");
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        for ($i = 1; $i < $count - 1; $i++) {
            $cartId = $allInput["inputBox" . $i];
            $cart = Cart::where("id", "=", $cartId)->first();
            $detail = new Detail();

            $detail->qty = $cart->qty;
            $detail->product_id = $cart->product_id;
            $detail->transaction_id = $transaction->id;
            $detail->save();
            $cart->delete();
        }
        return redirect()->back();
    }
}
