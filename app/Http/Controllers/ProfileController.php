<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function create()
    {
        $userData = Auth::user();
        return view('profile', ['userData' => $userData]);
    }

    public function update(Request $request){
        $validateData = $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'email:dns', 'max:255'],
            'dob' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'picture_path' => ['image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

        $userData = Auth::user();
        
        $userData->name = $validateData['name'];
        $userData->email = $validateData['email'];
        $userData->dob = $validateData['dob'];
        $userData->address = $validateData['address'];

        if ($request->hasFile('picture_path')) {
            Storage::delete('public/'.$userData->picture_path);
            
            $file = $request->file('picture_path'); 

            $imageName = time().'_'.$file->getClientOriginalName();
            Storage::putFileAs('public/profiles/', $file, $imageName);
            $imagePath = 'profiles/' . $imageName;

            $userData->picture_path = $imagePath;
        }
        
        $userData->save();
        return redirect('/profile')->with('success', 'Successfully Updated Your Profile');
    }

    public function showChangePassword(){
        return view('change-password');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }
        
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        if(strcmp($request->get('new-password'), $request->get('new-password-confirm')) != 0){
            return redirect()->back()->with("error","New Password and New Password Confirm must same.");
        }

        $validator = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|min:6',
        ]);

        $user = Auth::user();
        $user->password = $request->get('new-password');
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
