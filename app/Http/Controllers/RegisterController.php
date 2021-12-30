<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function customer(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users', 'max:255'],
            'password' => ['required', 'min:6'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_number'] = 1;

        User::create($validateData);

        return redirect('/auth/login/customer')->withSuccess('Successfully Registered Your Account');
    }

    public function seller(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users', 'max:255'],
            'password' => ['required', 'min:6'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_number'] = 2;

        User::create($validateData);

        return redirect('/auth/login/seller')->with('success', 'Successfully Registered Your Account');
    }
}