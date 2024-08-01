<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('dashboard', compact('products'));
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
