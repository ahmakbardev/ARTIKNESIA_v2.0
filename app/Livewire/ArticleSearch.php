<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleSearch extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
     
        $articles = Article::query()
            ->with('author:id,name')
            ->when($this->search, function ($query) {
               
                $query->where('title', 'like', "%{$this->search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        ;

        return view('livewire.article-search',compact('articles'));
    }
}
