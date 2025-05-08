<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Karya;
use App\Models\JenisKarya;
use App\Models\Kota;
use App\Models\Negotiation;
use App\Models\NegotiationBatch;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Subkategori;
use App\Services\RajaOngkir;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View
    {
        $art_categories = JenisKarya::query()->limit(4)->get();
        $art_recommendations = Karya::query()->where('status', 'accepted')->where('slug', '!=', null)->with(['seniman'])->limit(4)->orderBy('view_count', 'desc')->get();
        $arts = Karya::query()->where('status', 'accepted')->where('slug', '!=', null)->with('seniman')->limit(10)->get();
        $articles = Article::query()->with('author:id,name')->orderBy('created_at', 'desc')->limit(8)->get();
        return view('pages.index', compact('art_categories', 'arts', 'art_recommendations', 'articles'));

    }

    public function art($art)
    {
        $batch = NegotiationBatch::query()->with('negotiations.customer')->where('product_id', $art)->where('status', 'open')->first();

        return view('pages.art-detail', compact('art', 'batch'));
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
        $nego = Negotiation::query()->with('batch.product')->where('user_id', Auth::id())->orderBy('status')->get();
        $productIds = $nego->pluck('batch.product.id');
        $transaction = OrderItem::query()->whereHas('order', function ($query) {
            $query->where('status', 'success');
        })->whereIn('product_id', $productIds)->get();

        $negotiations = $nego->each(function ($item) use ($transaction) {
            $item->payment_status = !!$transaction->firstWhere('product_id', $item->batch->product_id);
            return $item;
        });

        return view('pages.transaction', compact('orders', 'negotiations'));
    }

    public function transactionDetail($order)
    {
        $orderItems = OrderItem::query()
            ->join('karyas', 'karyas.id', 'order_items.product_id')
            ->join('shipping_orders', function ($join) {
                $join->on('shipping_orders.product_id', 'karyas.id');
                $join->on('shipping_orders.order_id', 'order_items.order_id');
            })
            ->where('order_items.order_id', $order)
            ->select('karyas.name as product', 'quantity', 'karyas.price', 'courier', 'resi', 'cost')
            ->get();

        return view('pages.transaction-detail', compact('orderItems'));
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function comingSoon(): View
    {
        return view('pages.coming-soon');
    }

    public function artList(): View
    {
        return view('pages.art-list');
    }
}
