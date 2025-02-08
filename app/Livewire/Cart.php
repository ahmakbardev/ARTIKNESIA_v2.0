<?php

namespace App\Livewire;

use App\Models\Karya;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $arts;
    protected $listeners = ['addToCart', 'removeFromCart'];

    public function mount(): void
    {
        $this->loadArts();
    }

    public function loadArts(): void
    {
        $this->arts = session()->get('cart', []);
    }

    #[On('add-to-cart')]
    public function addToCart($id): void
    {
        $art = Karya::query()->find($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $quantity = $cart[$id]['quantity'] + 1;
            if ($quantity > $art->stock) {
                $this->dispatch('swal', message: 'Stock mencapai batas', success: false);
            } else {
                $cart[$id]['quantity']++;
                $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];

                $this->dispatch('swal', message: 'Berhasil ditambahkan ke keranjang', success: true);
            }
        } else {
            if ($art->stock == 0) {
                $this->dispatch('swal', message: 'Stock barang sudah habis', success: false);
            } else {
                $cart[$id] = [
                    "name" => $art->name,
                    "quantity" => 1,
                    "price" => $art->price,
                    "total_price" => $art->price,
                    "image" => $art->images[0],
                    "artist_id" => $art->user_id,
                    "courier" => null,
                ];
                $this->dispatch('swal', message: 'Berhasil ditambahkan ke keranjang', success: true);
            }
        }

        session()->put('cart', $cart);

        $this->arts = $cart;
    }

    #[On('remove-from-cart')]
    public function removeFromCart($id): void
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        $this->arts = session()->get('cart', []);
        $this->dispatch('update-cart');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        session()->put('checkoutItem', $cart);

        return redirect()->route('checkout');
    }

    public function render(): \Illuminate\View\View
    {
        $arts = collect($this->arts)->take(3);
        return view('livewire.cart', [
            'art_items' => $arts,
            'art_count' => count($this->arts),
        ]);
    }
}
