<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Karya;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class SearchProduct extends Component
{
    public string $query = '';
    public array|Collection $results = [];

    public $selectedItem;
    // Search By
    public bool $isOpen = false;

    // Event for Dropdown
    #[On('hideDropdown')]
    public function clearQuery()
    {
        $this->query = '';
    }
    public function selectItem($item)
    {

        $this->selectedItem = $item;
        $this->isOpen = !$this->isOpen;
    }
    public function toggleSearchBy()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function updatedQuery()
    {
        if ($this->selectedItem === 'By Karya' || !$this->selectedItem) {
            $this->results = Karya::query()->where('name', 'like', '%' . $this->query . '%')
                ->where('status', 'accepted')
                ->take(5)
                ->get();
        } else {
            $this->results = Article::query()->where('title', 'like', '%' . $this->query . '%')
                ->where('status', 'publish')
                ->take(5)
                ->get();
        }

    }

    public function render(): View
    {
        return view('livewire.search-product');
    }
}
