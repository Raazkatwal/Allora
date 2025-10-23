<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $title = "Home | Allora";
    public $products;

    public function mount(){
        $this->products = Product::with('images', 'category')->get();
    }

    public function render()
    {
        return view('livewire.home')->layout('components.layouts.app', ['title' => $this->title, 'mt' => '40']);
    }
}
