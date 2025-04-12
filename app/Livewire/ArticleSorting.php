<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class ArticleSorting extends Component
{
    public $sortField = 'created_at';
    public $sortDirection  = 'desc';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'desc';
        }

        $this->sortField = $field;

        Log::info("Sorting by: $this->sortField, Direction: $this->sortDirection");
    }

    public function render()
    {
        $articles = Article::orderBy($this->sortField, $this->sortDirection)->take(10)->get();
        return view('livewire.article-sorting', compact('articles'));
    }
}