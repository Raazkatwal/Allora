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

    public $search = '';
    public $name;
    public $description;
    public $Id;
    public $category_id;
    public $image;

    public $isAddModalOpen = false;
    public $isEditModalOpen = false;
    public $isDeleteModalOpen = false;
    public $isConfirmModalOpen = false;
    public $UsersSectionvisible = false;
    public $ProductSectionvisible = true;
    public $CategoriesSectionvisible = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'image' => 'nullable|image|max:3000',
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
                            ->with('profile')
                            ->get();
        $categories = Category::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('description', 'like', '%' . $this->search . '%')
                            ->orWhere('id', 'like', '%' . $this->search . '%')
                            ->get();
        return view('livewire.products-table',
        [
            'products' =>  $products,
            'users' => $users,
            'categories' => $categories
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
        $this->Id = $id;
        $product = Product::findOrFail($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->isEditModalOpen = true;
    }
    public function showCategoryEditModal($id)
    {
        $this->resetModal();
        $this->Id = $id;
        $c = Category::findOrFail($id);
        $this->name = $c->name;
        $this->description = $c->description;
        $this->isEditModalOpen = true;
    }
    public function showDeleteModal($id)
    {
        $this->resetModal();
        $this->Id = $id;
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
        $this->isConfirmModalOpen = false;

        $this->reset(['name', 'description', 'Id', 'category_id', 'image']);
    }
    public function addCategory()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->closeModal();
    }
    public function viewCategory(int $id){

    }
    public function updateCategory()
    {
        $this->validate();

        $category = Category::find($this->Id);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->closeModal();
    }
    public function deleteCategory()
    {
        Category::destroy($this->Id);
        $this->closeModal();
    }
    public function deleteUser()
    {
        User::destroy($this->Id);
        $this->closeModal();
    }
    public function addProduct()
    {
        $this->validate();
        dd($this->image);
        $imagePath = $this->image->store('images', 'public');
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category_id,
            // 'image' => $imagePath,
        ]);
        $this->closeModal();
    }
    public function viewProduct(int $id){

    }
    public function updateProduct()
    {
        $this->validate();

        $product = Product::find($this->Id);
        $product->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->closeModal();
    }
    public function deleteProduct()
    {
        Product::destroy($this->Id);
        $this->closeModal();
    }
    public function resetviews(){
        $this->ProductSectionvisible = false;
        $this->UsersSectionvisible = false;
        $this->CategoriesSectionvisible = false;
    }
    public function userclick(){
        $this->resetviews();
        $this->UsersSectionvisible = true;
    }
    public function productclick(){
        $this->resetviews();
        $this->ProductSectionvisible = true;
    }
    public function categoriesclick(){
        $this->resetviews();
        $this->CategoriesSectionvisible = true;
    }
    public function showConfirmModal($id){
        $this->resetModal();
        $this->Id=$id;
        $this->isConfirmModalOpen = true;
    }
    public function changeUser(){
        User::find($this->Id)->profile->update(['usertype' => 'admin']);
        $this->closeModal();
    }
}
