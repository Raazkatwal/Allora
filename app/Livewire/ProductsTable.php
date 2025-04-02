<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class ProductsTable extends Component
{
    use WithFileUploads;

    public $products;
    public $users;
    public $categories;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'image' => 'nullable|image|max:3000',
    ];
    public function mount()
    {
        $this->products = Product::latest()->get();
        $this->users = User::all();
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.products-table')->layout('components.layouts.admin_layout');
    }
}
