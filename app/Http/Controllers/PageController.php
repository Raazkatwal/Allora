<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products = Product::with('images')->get();
        return view('home', compact('products'));
    }
    public function profile(string $username){
        $user = User::where('username', $username)
                ->with('profile')
                ->first();
        // return $user;
        return view('profile', compact('user'));
    }
}
