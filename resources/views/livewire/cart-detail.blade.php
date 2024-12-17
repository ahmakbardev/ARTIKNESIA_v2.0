<div>
    <h1 class="text-2xl font-bold">Keranjang Kamu</h1>
    <div class="my-5">

        @if($art_count > 0)
            @foreach($art_items as $index => $item)
                <div class="grid grid-cols-4 gap-x-3 border border-gray-300 rounded-lg">
                    <img src="{{ Str::startsWith($item['images'], 'http') ? $item['images'] : env('MEDIA_URL').'/'.$item['images'] }}" class="rounded-l-lg object-cover col-auto" alt=""/>
                    <div class="col-span-3 text-start flex flex-col justify-between p-5">
                        <div class="flex justify-between">
                            <h6 class="text-2xl font-semibold line-clamp-1">{{ $item['name'] }}</h6>
                            <input type="checkbox" class="size-5" id="cart-checkbox-{{$index}}" value="{{ $index }}"
                                   wire:model="selectedItem"/>
                        </div>
                        <div class="flex flex-row justify-between items-end">
                            <div>
                                <p class="text-lg">{{ $item['quantity'] }} Item</p>
                                <p class="text-3xl font-semibold w-fit"></p>
                            </div>
                            <i wire:click="removeFromCart({{ $index }})" class="fas fa-trash text-3xl text-red-600"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-sm w-full">Kosong</p>
        @endif
    </div>
    <div class="w-full flex justify-end">
        <button type="button" wire:click="getSelectedItem"
                class="bg-primary px-5 py-3 text-2xl font-bold text-white rounded-xl">Checkout
            Sekarang
        </button>
    </div>
</div>
