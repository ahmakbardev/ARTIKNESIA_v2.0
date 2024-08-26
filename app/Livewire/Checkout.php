<?php

namespace App\Livewire;

use App\Models\Karya;
use App\Models\Kota;
use App\Models\Order;
use App\Services\Midtrans;
use App\Services\RajaOngkir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;

class Checkout extends Component
{
    public $selectedCity = null;
    public $checkoutItem;
    public $courierCount;

    public function mount()
    {
        $checkoutItem = session()->get('checkoutItem');

        $checkoutItemCollection = collect($checkoutItem);

        if (!$this->selectedCity) {
            $checkoutItemCollection = $checkoutItemCollection->map(function ($item) {
                $item['courier']      = null;
                $item['courier_cost'] = null;
                return $item;
            });
        }

        $this->courierCount = $checkoutItemCollection->where('courier', '!=', null)->pluck('courier')->count();

        $this->checkoutItem = $checkoutItemCollection->toArray();
    }

    public function loadCheckoutItem()
    {
        $this->checkoutItem = session()->get('checkoutItem');
    }

    public function loadCourierCount()
    {
        if (!is_array($this->checkoutItem) && !$this->checkoutItem instanceof \Illuminate\Support\Collection) {
            $this->checkoutItem = collect([]);
        }

        $this->courierCount = collect($this->checkoutItem)
            ->whereNotNull('courier')
            ->count();

        $this->loadCheckoutItem();
    }

    public function updateCity($cityId)
    {
        $this->selectedCity = $cityId;
    }

    public function updateKurir($itemId, $courier)
    {
        $rajaOngkir   = new RajaOngkir();
        $checkoutItem = $this->checkoutItem;
        if (isset($checkoutItem[$itemId])) {
            $item                                  = Karya::query()->find($itemId);
            $rajaOngkirCost                        = $rajaOngkir->cost(256, $this->selectedCity, $item->weight, $courier);
            $checkoutItem[$itemId]['courier']      = $courier;
            $checkoutItem[$itemId]['courier_cost'] = $rajaOngkirCost['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }
        session()->put('checkoutItem', $checkoutItem);
        $this->checkoutItem = $checkoutItem;
        $this->loadCourierCount();
    }

    public function checkout()
    {
        $user         = Auth::user();
        $checkoutItem = collect($this->checkoutItem);
        $price        = $checkoutItem->pluck('total_price')->sum();
        $courierCost  = $checkoutItem->pluck('courier_cost')->sum();
        $arts         = Karya::query()->whereIn('id', $checkoutItem->keys())->get();
        $items        = [];
        $itemDetails  = [];
        foreach ($checkoutItem as $index => $item) {
            $items[$index] = [
                'product_id' => $index,
                'price'      => $item['price'],
                'quantity'   => $item['quantity'],
                'shipments'  => [
                    'courier'     => $item['courier'],
                    'cost'        => $item['courier_cost'],
                    'destination' => $this->selectedCity,
                ],
            ];
            $itemDetails[] = [
                'id'       => $index,
                'price'    => $item['price'],
                'quantity' => $item['quantity'],
                'name'     => substr($item['name'], 0, 10),
            ];
        }

        $order      = Order::query()->create([
            'user_id'     => $user->id,
            'total_price' => $price + $courierCost,
        ]);
        $orderItems = $order->orderItems()->createMany($items);

        $transactionDetails = [
            'order_id'     => $order->id . '-' . Str::random(5),
            'gross_amount' => $price + $courierCost,
        ];
        $customerDetails    = [
            'first_name' => $user->name,
            'email'      => $user->email,
        ];

        $midtransParams = [
            'transaction_details' => $transactionDetails,
            'item_details'        => $itemDetails,
            'customer_details'    => $customerDetails,
        ];

        $midtrans = new Midtrans();

        $midtransSnapUrl = $midtrans->getMidtransSnapUrl($midtransParams);

        $order->snap_url = $midtransSnapUrl;
        $order->metadata = $items;
        $order->save();

        session()->put('checkoutItem', []);

        return redirect()->to($midtransSnapUrl);
    }

    public function render(): View
    {
        $cities       = Kota::query()->get();
        $checkoutItem = collect($this->checkoutItem);
        $price        = $checkoutItem->pluck('total_price')->sum();
        $courierCount = $this->courierCount;
        $courierCost  = $checkoutItem->pluck('courier_cost')->sum();

        return view('livewire.checkout', [
            'cities'       => $cities,
            'price'        => $price,
            'checkoutItem' => $this->checkoutItem,
            'selectedCity' => $this->selectedCity,
            'courierCount' => $courierCount,
            'courierCost'  => $courierCost,
        ]);
    }
}
