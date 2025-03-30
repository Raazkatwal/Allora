<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AllProducts extends Component
{
    public $categories;
    public $categoryIds;
    public $products;
    public $min;
    public $max;
    public $sort;
    public $selectedMin; 
    public $selectedMax; 

    public function mount(){
        $this->categories = Category::all();
        $this->products = Product::with('images', 'category')->get();
        $this->min = $this->products->isEmpty() ? 00 : $this->products->min('price');
        $this->max = $this->products->isEmpty() ? 999 : $this->products->max('price');
    }

    public function applyFilters(){
        $this->products = Product::with('images', 'category');
        if ($this->selectedMin || $this->selectedMax) {
            $this->products = $this->products->whereBetween('price', [(int)$this->selectedMin, (int)$this->selectedMax]);
        }
        if ($this->sort) {
            $this->products = $this->products->orderBy('price', $this->sort);
        }
        if ($this->categoryIds) {
            $this->products = $this->products->whereIn('category_id', $this->categoryIds);
        }
        $this->products = $this->products->get();
    }

    public function render()
    {
        return view('livewire.all-products');
    }
}
