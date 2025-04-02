<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class CategoriesTable extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.categories-table')->layout('components.layouts.admin_layout');
    }
}
