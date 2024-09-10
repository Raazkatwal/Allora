<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products = Product::with('images')->get();
        return view('home', compact('products'));
    }
}
