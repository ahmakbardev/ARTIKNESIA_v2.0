<?php

namespace App\Livewire;

use App\Models\Karya;
use App\Models\SubKategori;
use Livewire\Component;

class ArtItemHome extends Component
{
    public $artCategories;
    public $selectedCategory = null;
    public $arts;

    public function mount(): void
    {
        $this->artCategories = SubKategori::all();
        $this->loadArtItems();
    }

    public function loadArtItems(): void
    {
        if ($this->selectedCategory) {
            $this->arts = Karya::query()->where('category_id', $this->selectedCategory)->limit(10)->get();
        } else {
            $this->arts = Karya::query()->limit(10)->get();
        }
    }

    public function selectCategory($categoryId): void
    {
        $this->selectedCategory = $categoryId;
        $this->loadArtItems();
    }


    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.art-item-home', [
            'arts'          => $this->arts,
            'artCategories' => $this->artCategories,
        ]);
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('addToCart', $id);
    }
}
