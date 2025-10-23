<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class NavBar extends Component
{
    #[Computed]
    public function totalCartItems()
    {
        if (Auth::guest()) {
            return 0;
        }

        $user = Auth::user();

        if (!$user->cart) {
            return 0;
        }

        $count = $user->cart->items()->sum('quantity');
        return $count ?? 0;
    }

    #[On('cart-item-added')]
    public function updateCount()
    {
        // Trigger reactivity to recalculate totalCartItems
        unset($this->totalCartItems);
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
