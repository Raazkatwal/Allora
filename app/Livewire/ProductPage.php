<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductPage extends Component
{
    public Product $product;
    public int $quantity = 1;

    public function mount(int $id){
        $this->product = Product::with('images', 'category')->find($id);
    }

    public function cartAdd(){
        if (Auth::guest()) {
            return $this->redirect(Login::class);
        }

        $user = Auth::user();

        $cart = $user->cart()->firstOrCreate(['user_id' => $user->id]);

        $cartItem = $cart->items()->where('product_id', $this->product->id)->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $this->quantity,
                'price' => $this->product->price, // Ensure price is up-to-date
            ]);
        } else {
            $cart->items()->create([
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'price' => $this->product->price,
            ]);
        }
        $this->dispatch('cart-item-added');
    }

    public function render()
    {
        return view('livewire.product-page', [
            'similarProducts' => Product::inRandomOrder()->take(rand(4, 12))->with('images' ,'category')->get()
        ]);
    }
}
