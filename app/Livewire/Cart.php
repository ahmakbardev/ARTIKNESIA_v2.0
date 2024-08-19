<?php

namespace App\Livewire;

use App\Models\Karya;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public    $arts;
    protected $listeners = ['addToCart', 'removeFromCart'];

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
        $art = Karya::query()->find($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total_price'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        } else {
            $cart[$id] = [
                "name"        => $art->name,
                "quantity"    => 1,
                "price"       => $art->price,
                "total_price" => $art->price,
                "image"       => $art->images[0],
                "artist_id"   => $art->user_id,
                "courier"     => null,
            ];
        }

        session()->put('cart', $cart);

        $this->arts = $cart;
    }

    public function removeFromCart($id): void
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            $this->arts = $cart;
        }
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
