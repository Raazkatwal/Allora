<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers;
    public $totalProducts;
    public $totalCategories;

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->totalProducts = Product::count();
        $this->totalCategories = Category::count();
    }
    public function render()
    {
        return view('livewire.dashboard')->layout('components.layouts.admin_layout');
    }
}
