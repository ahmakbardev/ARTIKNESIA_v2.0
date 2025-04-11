<?php

namespace App\Livewire;

use App\Models\Karya;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Negotiation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class DetailArt extends Component
{
    public $art, $batch, $price, $quantity = 1;

    public function mount(Karya $art, $batch): void
    {
        $art->load(['category.jenisKarya', 'seniman']);
        $this->art = $art;
        $this->batch = $batch;

        // Increment view count with cache. so, user can't spam
        $this->incrementViewCount($art);
    }

    private function incrementViewCount(Karya $art): void
    {
        $userId = auth()->id() ?? 'guest'; // Handle user guest
        $cacheKey = "viewed_art_{$art->id}_by_user_{$userId}";

        if (!Cache::has($cacheKey)) {
            $art->increment('view_count'); // Increment view count di DB
            Cache::put($cacheKey, true, now()->addHours(24)); // Cache selama 24 jam
        }
    }

    public function addToCart(int $id): void
    {
        $this->dispatch('add-to-cart', id: $id);
    }

    public function negotiation()
    {
        if (Auth::check()) {
            $this->validate([
                'price' => 'required|numeric|min:1', // Adjust validation rules as needed
            ]);

            Negotiation::query()->create([
                'user_id' => Auth::id(),
                'negotiation_batch_id' => $this->batch->id,
                'artist_id' => $this->art->user_id,
                'price' => $this->price,
            ]);
            return redirect()->route('art', $this->art->id);
        } else {
            return redirect()->route('login');
        }
    }

    public function checkout($id): void
    {
        $art = Karya::find($id);
        $checkout[$id] = [
            "name" => $art->name,
            "quantity" => $this->quantity,
            "price" => $art->price,
            "total_price" => $this->quantity * $art->price,
            "image" => $art->images[0],
            "artist_id" => $art->user_id,
            "courier" => null,
        ];

        session()->put('checkoutItem', $checkout);
        $this->redirectRoute('checkout');
    }

    public function render(): View
    {
        return view('livewire.detail-art');
    }
}
