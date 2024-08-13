<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\JenisKarya;
use App\Models\Subkategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View
    {
        $art_categories      = JenisKarya::query()->limit(4)->get();
        $art_recommendations = Karya::query()->with('seniman')->limit(4)->get();
        $arts                = Karya::query()->with('seniman')->limit(10)->get();
        return view('pages.index', compact('art_categories', 'arts', 'art_recommendations'));
    }
}
