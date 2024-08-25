<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(Request $req){
        $req->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'username' => $req->username,
        ]);
        $user->userinfo()->create([
            'usertype' => 'customer',
            'address' => '',
            'phone' => '',
            'photo' => ''
        ]);
        if ($user) {
            return redirect()->route('login');
        }
    }
    public function loginUser(Request $req){
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'This E-mail is not registered.',
        ]);
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->route('index');
        } else {
            return back()->withErrors([
                'password' => 'The Password is incorrect.',
            ])->withInput();
        }
        
    }
    public function logoutUser(){
        Auth::logout();
        return redirect()->route('index');
    }
}
