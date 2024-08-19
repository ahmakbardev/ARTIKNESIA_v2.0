<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\JenisKarya;
use App\Models\Kota;
use App\Models\Order;
use App\Models\Subkategori;
use App\Services\RajaOngkir;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $checkoutItem = session()->get('checkoutItem');
        if ($checkoutItem === null || count($checkoutItem) === 0) {
            return redirect()->route('cart-detail')->with('error', 'Harap memilih satu item untuk di checkout');
        }
        return view('pages.checkout');
    }

    public function transaction()
    {
        $orders = Order::query()->where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();

        return view('pages.transaction', compact('orders'));
    }

    public function transactionDetail(Order $order)
    {
        $order->load(['orderItems.product']);

        return view('pages.transaction-detail', compact('order'));
    }
}
