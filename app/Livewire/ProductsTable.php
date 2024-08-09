<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    public $search = '';
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->get();
        return view('livewire.products-table',
        [
            'products' =>  $products
        ]
    );
    }
    public function delete(Product $product){
        $product->delete();
    }
}
