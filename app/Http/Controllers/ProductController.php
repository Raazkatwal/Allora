<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    public function allProducts(){
        $categories = Category::all();
        $products = Product::with('images', 'category')->get();
        $min = $products->isEmpty() ? 00 : $products->min('price');
        $max = $products->isEmpty() ? 999 : $products->max('price');
        return view('allproducts', compact('products', 
        'min', 'max',
         'categories'));
    }
    public function filterProducts(Request $request){
        $categories = Category::all();
        
        $products = Product::with('images', 'category');
        if ($request->has('categories')) {
            $products->whereIn('category_id', $request->categories);
        }

        if ($request->filled('min-price') && $request->filled('max-price')) {
            $products->whereBetween('price', [$request->input('min-price'), $request->input('max-price')]);
        }

        if ($request->sort === 'low_to_high') {
            $products->orderBy('price', 'asc');
        } elseif ($request->sort === 'high_to_low') {
            $products->orderBy('price', 'desc');
        }
        $filteredProducts = $products->get();
        $minPrice = $filteredProducts->min('price');
        $maxPrice = $filteredProducts->max('price');
        return view('allproducts', [
            'products' => $filteredProducts,
            'categories' => $categories,
            'min' => $minPrice,
            'max' => $maxPrice,
        ]);
    }
}
