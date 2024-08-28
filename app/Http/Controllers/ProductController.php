<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        if (!Auth::check() || Auth::user()->profile->usertype != 'admin') {
            return redirect()->route('index');
        }else {
            $products=Product::all();
            return view('dashboard', compact('products'));
        }
    }
    public function show(string $id){
        $product=Product::find($id);
        return view('product', compact('product'));
    }
    public function edit(string $id){
        $product=Product::find($id);
        return view('product', compact('product'));
    }
    public function delete(string $id){
        $product=Product::find($id);
        return view('product', compact('product'));
    }
}
