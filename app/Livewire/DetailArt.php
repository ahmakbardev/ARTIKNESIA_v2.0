<?php

namespace App\Livewire;

use App\Models\Karya;
use Illuminate\View\View;
use Livewire\Component;

class DetailArt extends Component
{
    public $art;

    // Accept the $art model in the mount method
    public function mount(Karya $art): void
    {
        $this->art = $art;
    }

    public function render(): View
    {
        return view('livewire.detail-art');
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('addToCart', $id);
    }
}
