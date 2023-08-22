<?php

namespace App\Http\Livewire;

use App\Models\Packages;
use Livewire\Component;

class Packageswire extends Component
{
    public $packages;
    public $cart = [];

    public function mount(){
        $this->packages = Packages::all();
        $this->cart = session()->get('cart', []);
    }

    public function addToCart() {
       
        
        redirect()->route('cart');
    }

    public function removeFromCart($index) {
        unset($this->cart[$index]);
        $this->cart = array_values($this->cart);  // Reindex the array
        session()->put('cart', $this->cart);
        session()->save();
    }

    public function render() {
        return view('livewire.packageswire');
    }
}