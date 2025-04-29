<?php

namespace App\Livewire;

use Livewire\Component;

class OrdersTable extends Component
{
    public function render()
    {
        return view('livewire.orders-table')->layout('components.layouts.admin_layout');
    }
}
