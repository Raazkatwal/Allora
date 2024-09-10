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
        $product = Product::with('images')->find($id);
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
    public function addProduct(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category_id' => 'nullable|exists:categories,id',
            'images.*' => 'required|image|max:10240',
            'price' => 'required|numeric',
        ]);
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $product->images()->create([
                'path' => $path,
            ]);
        }
    
        return redirect()->route('admin.panel');
    
    }
}
