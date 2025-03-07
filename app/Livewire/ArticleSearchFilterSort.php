<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleSearchFilterSort extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterYear = '';
    public $filterMonth = '';
    // create for filter By Date

    public function filterBy($query)
    {

        if ($this->filterYear) {
            $query->whereYear('created_at', $this->filterYear);
        }

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        return $query;
    }

    public function sortBy($field)
    {
        // if ($this->sortField === $field) {
        //     $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        // } else {
        //     $this->sortDirection = 'desc';
        // }

        // $this->sortField = $field;

        if($field === 'terbaru') {
            $this->sortField = 'created_at';
            $this->sortDirection = 'desc';
        }
        elseif($field === 'terlama') {
            $this->sortField = 'created_at';
            $this->sortDirection = 'asc';
        }
        elseif($field === 'populer') {
            $this->sortField = 'view_count';
            $this->sortDirection = 'desc';
        }

        Log::info("Sorting by: $this->sortField, Direction: $this->sortDirection");
    }

    public function render()
    {
        $articles = Article::query()
            ->with('author:id,name')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%");
            });

        //Apply the FilterBy
        $articles = $this->filterBy($articles);

        // Sorting data and Get Data
        $articles = $articles->orderBy($this->sortField, $this->sortDirection)->get();

        return view('livewire.article-search-filter-sort', compact('articles'));
    }
}
