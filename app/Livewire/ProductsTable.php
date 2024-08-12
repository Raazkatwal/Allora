<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    public $search = '';
    public $name;
    public $description;
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%')
                            ->get();
        return view('livewire.products-table',
        [
            'products' =>  $products
        ]
    );
    }
    public function delete(string $id){
        Product::find($id)->delete();
    }
    public function addNewProduct(){
        Product::create([
            'name' => $this->name,
            'description' => $this->description
        ]);
    }
}
