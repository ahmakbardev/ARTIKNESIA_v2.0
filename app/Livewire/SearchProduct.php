<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Karya;
use Illuminate\Support\Str;
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

    #[On('hideSearchBy')]
    public function closeSearchBy()
    {
        if ($this->isOpen = true) {
            $this->isOpen = false;
        }

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
        $this->reset('results');
        // Find Article Or Karya Where Has # in search Query
        if (Str::startsWith($this->query, '#') && $this->selectedItem === 'By Article') {
            $tagQuery = ltrim($this->query, '#');
            if ($tagQuery === '' || $tagQuery === null) {
                $this->results = collect([]);
                return;
            } else {
                $id_tag_article = ArticleTag::query()
                    ->where('name', 'like', '%' . $tagQuery . '%')
                    ->pluck('id');

                if ($id_tag_article->isEmpty()) {
                    return $this->results = collect([]);
                }

                $this->results = Article::query()
                    ->where('status', 'publish')
                    ->where(function ($query) use ($id_tag_article) {
                        foreach ($id_tag_article as $tagId) {
                            $query->orWhereJsonContains('tags', (int) $tagId);
                        }
                    })
                    ->take(5)
                    ->orderBy('title', 'desc')
                    ->get();
            }



        } else {
            if ($this->selectedItem === 'By Karya' || !$this->selectedItem) {
                $this->results = Karya::query()->where('name', 'like', '%' . $this->query . '%')
                    ->where('status', 'accepted')
                    ->take(5)
                    ->orderBy('name', 'asc')
                    ->get();
            } else {
                $this->results = Article::query()
                    ->where('title', 'like', '%' . $this->query . '%')
                    ->where('status', 'publish')
                    ->take(5)
                    ->orderBy('title', 'asc')
                    ->get();

            }
        }



    }

    public function render(): View
    {
        return view('livewire.search-product');
    }
}
