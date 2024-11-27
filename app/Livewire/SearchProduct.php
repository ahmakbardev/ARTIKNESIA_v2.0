<?php

namespace App\Livewire;

use App\Models\Karya;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchProduct extends Component
{
    public string $query = '';
    public array|Collection $results = [];

    public function updatedQuery()
    {
        $this->results = Karya::query()->where('name', 'like', '%' . $this->query . '%')
            ->where('status', 'accept')
            ->take(5)
            ->get();
    }

    public function render(): View
    {
        return view('livewire.search-product');
    }
}
