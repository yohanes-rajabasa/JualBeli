<?php

namespace App\Http\Controllers;

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

        if(Auth::attempt($validateData)){
            return redirect('/');
        }
        return redirect()->back()->withErrors('Invalid Login');
    }

    public function performLogout(){
        Auth::logout();
        return redirect('/');
    }
}
