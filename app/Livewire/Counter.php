<?php
 
namespace App\Livewire;
 
use Livewire\Component;
use App\Models\User;
 
class Counter extends Component
{
    public $count = 1;
    public $string;
 
    public function increment()
    {
        $this->count++;
        $this->string = "Incremented";
    }
    
    public function decrement()
    {
        $this->count--;
        $this->string = "Decremented";
    }
 
    public function render()
    {
        $users = User::find(1);
        return view('livewire.counter', compact('users'));
    }
}