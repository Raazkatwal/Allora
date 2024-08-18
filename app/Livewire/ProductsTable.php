<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    public $search = '';
    public $name;
    public $description;
    public $productId;

    public $isAddModalOpen = false;
    public $isEditModalOpen = false;
    public $isDeleteModalOpen = false;
    public $Usersectionvisible = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
    ];
    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%')
                            ->get();
        $users = User::where('username', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%')
                            ->get();
        return view('livewire.products-table',
        [
            'products' =>  $products,
            'users' => $users
        ]
    );
    }
    public function showAddModal()
    {
        $this->resetModal();
        $this->isAddModalOpen = true;
    }
    public function showEditModal($id)
    {
        $this->resetModal();
        $this->productId = $id;
        $product = Product::findOrFail($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->isEditModalOpen = true;
    }
    public function showDeleteModal($id)
    {
        $this->resetModal();
        $this->productId = $id;
        $this->isDeleteModalOpen = true;
    }
    public function closeModal()
    {
        $this->resetModal();
    }
    public function resetModal()
    {
        $this->isAddModalOpen = false;
        $this->isEditModalOpen = false;
        $this->isDeleteModalOpen = false;

        $this->reset(['name', 'description', 'productId']);
    }
    public function addProduct()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->closeModal();
    }
    public function viewProduct(int $id){

    }
    public function updateProduct()
    {
        $this->validate();

        $product = Product::find($this->productId);
        $product->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->closeModal();
    }
    public function deleteProduct()
    {
        Product::destroy($this->productId);
        $this->closeModal();
    }
    public function deleteUser()
    {
        User::destroy($this->productId);
        $this->closeModal();
    }
    public function userclick(){
        $this->Usersectionvisible = true;
    }
    public function productclick(){
        $this->Usersectionvisible = false;
    }
}
