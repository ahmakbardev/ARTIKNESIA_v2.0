<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleRecommend extends Component
{
    public $article;
    public $recommendedArticles = [];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->fetchRecommendations();
        // dd($this->recommendedArticles);
    }

    public function fetchRecommendations()
    {
        // Ambil artikel rekomendasi berdasarkan kategori artikel saat ini
        $categoryBasedArticles = Article::where('id', '!=', $this->article->id)
            ->whereJsonContains('categories', $this->article->categories)
            ->orderBy('view_count', 'desc')
            ->limit(3) // Ambil maksimal 3 artikel berdasarkan kategori
            ->get();

        // Jika artikel berdasarkan kategori kurang dari 3, ambil sisa dari artikel dengan view_count tertinggi
        if ($categoryBasedArticles->count() < 3) {
            $remainingCount = 3 - $categoryBasedArticles->count();

            $mostViewedArticles = Article::where('id', '!=', $this->article->id)
                ->whereNotIn('id', $categoryBasedArticles->pluck('id')->toArray()) // MEnghindari duplikat
                ->orderBy('view_count', 'desc')
                ->limit($remainingCount)
                ->get();

            // Menggabungkan hasilnya
            $this->recommendedArticles = $categoryBasedArticles->merge($mostViewedArticles);
        } else {
            $this->recommendedArticles = $categoryBasedArticles;
        }
    }

    public function render()
    {
        return view('livewire.article-recommend', ['recommendedArticles' => $this->recommendedArticles,]);
    }
}
