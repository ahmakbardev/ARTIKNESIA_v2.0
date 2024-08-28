<?php

namespace App\Livewire;

use App\Models\JenisKarya;
use App\Models\Karya;
use App\Models\SubKategori;
use Livewire\Component;

class ArtItemHome extends Component
{
    public $categories, $subCategories, $selectedCategory, $selectedSubCategory, $arts;

    public function mount(): void
    {
        $this->categories = JenisKarya::all();
        $this->loadArts();
    }

    public function loadArts(): void
    {
        if ($this->selectedSubCategory != null) {
            $this->arts = Karya::query()->where('category_id', $this->selectedCategory)->get();
        } else {
            $this->arts = Karya::query()->limit(10)->get();
        }
    }

    public function selectCategory($categoryId): void
    {
        $this->selectedCategory = $categoryId;
        $this->subCategories    = SubKategori::where('jenis_karya_id', $categoryId)->get();
    }

    public function selectSubCategory($subCategoryId): void
    {
        $this->selectedSubCategory = $subCategoryId;
        $this->loadArts();
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('add-to-cart', id: $id);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.art-item-home');
    }
}
