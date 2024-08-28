<?php

namespace App\Livewire;

use App\Models\Karya;
use Livewire\Component;

class Negotiation extends Component
{
    public $negotiations;

    public function mount($negotiations)
    {
        $this->negotiations = $negotiations;
    }

    public function checkout($negotiation)
    {
        $checkout[$negotiation['batch']['product_id']] =
            [
                "name"        => $negotiation['batch']['product']['name'],
                "quantity"    => 1,
                "price"       => $negotiation['price'],
                "total_price" => $negotiation['price'],
                "image"       => $negotiation['batch']['product']['images'][0],
                "artist_id"   => $negotiation['artist_id'],
                "courier"     => null,

            ];

        session()->put('checkoutItem', $checkout);

        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.negotiation');
    }
}
