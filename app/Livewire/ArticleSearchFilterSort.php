<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

use function PHPSTORM_META\type;

class ArticleSearchFilterSort extends Component
{
    use WithPagination;

    public $search = '';

    public $categoryId = '';
    public $categoryName = '';
    public $statusFilterCategory = false;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterYear = '';
    public $filterMonth = '';
    public $filterDate = '';
    public $activeSort = 'terbaru';
    // create for filter By Date

    #[On('updateFilterDate')]
    public function updatedDate($date)
    {
        $this->filterDate = $date;
    }

    public function filterCategory($categoryId, $categoryName)
    {
        if ($this->categoryId === $categoryId) {
            $this->reset('categoryId', 'categoryName');
        } else {
            $this->categoryId = $categoryId;
            $this->categoryName = $categoryName;
            $this->statusFilterCategory = true;
        }

        $this->resetPage();
    }

    public function filterBy($query)
    {

        if ($this->filterYear) {
            $query->whereYear('created_at', $this->filterYear);
        }

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        if ($this->filterDate) {
            $query->whereDate('created_at', $this->filterDate);
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

        if ($field === 'terbaru') {
            $this->sortField = 'created_at';
            $this->sortDirection = 'desc';
            $this->activeSort = 'terbaru';
        } elseif ($field === 'terlama') {
            $this->sortField = 'created_at';
            $this->sortDirection = 'asc';
            $this->activeSort = 'terlama';
        } elseif ($field === 'populer') {
            $this->sortField = 'view_count';
            $this->sortDirection = 'desc';
            $this->activeSort = 'populer';
        }

        Log::info("Sorting by: $this->sortField, Direction: $this->sortDirection");
    }

    public function render()
    {
        $categories = ArticleCategory::all();
        $articles = Article::query()
            ->with('author:id,name')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%");
            })
            ->when($this->categoryId, function ($query) {
                $query->whereJsonContains('categories', (int) $this->categoryId);
            });

        //Apply the FilterBy
        $articles = $this->filterBy($articles);

        // Sorting data and Get Data
        $articles = $articles->orderBy($this->sortField, $this->sortDirection)->paginate(9);

        return view('livewire.article-search-filter-sort', compact('articles', 'categories'));
    }
}
