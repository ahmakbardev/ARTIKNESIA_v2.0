<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\JenisKarya;
use App\Models\Subkategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $art_categories      = JenisKarya::query()->limit(4)->get();
        $art_recommendations = Karya::query()->with('seniman')->limit(4)->get();
        $arts                = Karya::query()->with('seniman')->limit(10)->get();
        return view('pages.index', compact('art_categories', 'arts', 'art_recommendations'));
    }

    public function art($art)
    {
        return view('pages.art-detail', compact('art'));
    }

    public function cartDetail()
    {
        return view('pages.cart-detail');
    }

    public function checkout()
    {
        //
        return view('pages.checkout');
    }

    public function checkoutProcess()
    {
        //
    }

    public function payment()
    {
        //
        return view('pages.payment');
    }

    public function paymentProcess()
    {
        //
    }
}
