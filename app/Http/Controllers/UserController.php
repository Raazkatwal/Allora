<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $req){
        $req->validate([
            'email' => 'required|email|unique:App\Models\User,email',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = User::create([
            'email' => $req->email,
            'password' => $req->password,
            'username' => $req->username,
        ]);
        if ($user) {
            return redirect()->route('index');
        }
    }
}
