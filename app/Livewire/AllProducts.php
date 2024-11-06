<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AllProducts extends Component
{
    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        $min = Product::min('price');
        $max = Product::max('price');
        return view('livewire.all-products', compact('products', 'min', 'max', 'categories'));
    }
    public function test(){
        
    }
}
