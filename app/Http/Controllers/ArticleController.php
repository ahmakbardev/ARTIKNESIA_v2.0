<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Method for showing all data article
     * @return View
     */
    public function index(): View
    {
        // $articles = Article::query()->with('author:id,name')->orderBy('created_at', 'desc')->get();

        return view('pages.article.index');
    }

    /**
     * Method for showing detail article by slug
     * @param Article $article
     * @return View
     */
    public function show(Article $article): View
    {
        $article->load('author:id,name');

        return view('pages.article.show', compact('article'));
    }
}
