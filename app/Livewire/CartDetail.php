<?php

namespace App\Livewire;

use App\Models\Karya;
use Illuminate\Http\RedirectResponse;
use Livewire\Attributes\On;
use Livewire\Component;

class CartDetail extends Component
{
    public $arts;
    public $selectedItem = [];

    public function mount(): void
    {
        $this->loadArts();
    }

    #[On('update-cart')]
    public function loadArts(): void
    {
        $this->arts = session()->get('cart', []);
    }

    public function removeFromCart($id): void
    {
        $this->dispatch('remove-from-cart', $id);
        $this->loadArts();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.cart-detail', [
            'art_items' => $this->arts,
            'art_count' => count($this->arts),
        ]);
    }

    public function getSelectedItem()
    {
        $cart         = session()->get('cart', []);
        $checkoutItem = [];
        foreach ($this->selectedItem as $item) {
            $checkoutItem[$item] = $cart[$item];
        }

        if (count($checkoutItem) === 0) {
            return redirect()->route('cart-detail')->with('error', 'Harap memilih satu item untuk di checkout');
        }

        session()->put('checkoutItem', $checkoutItem);

        return redirect()->route('checkout');
    }
}
