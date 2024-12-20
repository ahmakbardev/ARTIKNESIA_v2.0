<div>
    <div class="mr-3 relative">
        <button id="cart-btn">
            <img src="{{ asset('images/icons/cart.svg') }}" class="size-6" alt="">
            <span
                class="absolute -bottom-3 -right-3 bg-red-300 size-5 rounded-full text-xs flex items-center justify-center text-white">{{ $art_count }}</span>
        </button>
        <div id="cart-dropdown"
             class="absolute top-10 right-0 bg-white shadow-2xl w-96 p-3 rounded-lg hidden gap-4">
            <div class="flex flex-row items-center justify-between">
                <h1 class="text-lg font-extrabold">Keranjang</h1>
                @if($art_count > 0)
                    <a href="{{route('cart-detail')}}" class="text-sm text-primary">Lihat Semua</a>
                @endif
            </div>
            @if($art_count > 0)
                @foreach($art_items as $index => $item)
                    <div class="grid grid-cols-3 gap-x-3">
                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item['image']) }}"
                             class="rounded-lg object-cover h-20" alt=""/>
                        <div class="col-span-2 text-start flex flex-col justify-between">
                            <div class="flex flex-row justify-between gap-x-0.5">
                                <h6 class="text-base font-semibold line-clamp-1">{{ $item['name'] }}</h6>
                                <p class="text-sm font-semibold w-fit">{{ \App\Helpers\Universal::idr($item['price']) }}</p>
                            </div>
                            <div class="flex flex-row justify-between">
                                <p class="text-sm">{{ $item['quantity'] }} Item</p>
                                <i wire:click="removeFromCart({{ $index }})" class="fas fa-trash text-red-600"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-sm w-full">Kosong</p>
            @endif
            <button wire:click="checkout" class="bg-primary text-white rounded-lg py-2 font-semibold">Checkout
                Sekarang
            </button>
        </div>
    </div>
</div>
