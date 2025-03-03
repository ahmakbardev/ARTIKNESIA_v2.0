<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**
     * Method for showing all data article
     * @return View
     */
    public function index(): View
    {
        $articles = Article::query()->with('author:id,name')->orderBy('created_at', 'desc')->get();

        return view('pages.article.index', compact('articles'));
    }

    /**
     * Method for showing detail article by slug
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        $cacheKey = 'viewed_article_' . $article->id . '_by_user_' . auth()->id();

        if (!Cache::has($cacheKey)) {
            $article->increment('view_count');
            Cache::put($cacheKey, true, now()->addHours(24));
        }

        $article->load('author:id,name');

        return view('pages.article.show', compact('article'));
    }
}
