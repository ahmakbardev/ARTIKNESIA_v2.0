<?php

namespace App\Livewire;

use App\Models\Karya;
use App\Models\Negotiation;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class DetailArt extends Component
{
    public $art;
    public $batch;
    public $price;


    // Accept the $art model in the mount method
    public function mount(Karya $art, $batch): void
    {
        $this->art   = $art;
        $this->batch = $batch;
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('addToCart', $id);
    }

    public function negotiation()
    {
        $this->validate([
            'price' => 'required|numeric|min:1', // Adjust validation rules as needed
        ]);

        Negotiation::query()->create([
            'user_id'              => Auth::id(),
            'negotiation_batch_id' => $this->batch->id,
            'artist_id'            => $this->art->user_id,
            'price'                => $this->price,
        ]);

        return redirect()->route('art', $this->art->id);
    }

    public function render(): View
    {
        return view('livewire.detail-art');
    }
}
