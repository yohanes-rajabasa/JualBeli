<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginCustomer(){
        return view('login-customer');
    }

    public function showLoginSeller(){
        return view('login-seller');
    }

    public function performLogin(Request $request){
        // $validateData = $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        // if(Auth::attempt($validateData)){
        //     return redirect('/');
        // }

        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($validateData);
        // $user = User::where('email','=',$request->email)->where('password','=',$request->password);
        // dd($user);
        if(Auth::attempt($validateData,true)){
            return redirect('/');
        }
        return redirect()->back()->withErrors('Invalid Login');
    }

    public function performLogout(){
        Auth::logout();
        return redirect('/');
    }
}
