<?php

namespace App\Livewire;

use App\Models\Karya;
use Livewire\Component;

class CartDetail extends Component
{
    public $arts;

    public function mount(): void
    {
        $this->loadArts();
    }

    public function loadArts(): void
    {
        $this->arts = session()->get('cart', []);
    }

    public function addToCart($id): void
    {
        $this->dispatch('addToCart', $id);
    }

    public function removeFromCart($id): void
    {
        $this->dispatch('removeFromCart', $id);
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.cart-detail', [
            'art_items' => $this->arts,
            'art_count' => count($this->arts),
        ]);
    }
}
