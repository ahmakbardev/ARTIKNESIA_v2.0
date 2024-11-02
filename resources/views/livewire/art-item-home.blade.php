<div>
    <div class="grid grid-rows-1 grid-flow-col gap-4 py-5 bg-white sticky top-28 z-10">
        @foreach($categories as $item)
            @php
                $isActive = $selectedCategory == $item->id;
            @endphp

            <button
                class="{{ $isActive ? 'py-3 text-center btn-color-fill font-semibold rounded-md hover:btn-color-outline hover:btn-color-fill-white transition-all ease-in-out' : 'py-3 text-center btn-color-outline font-semibold rounded-md hover:btn-color-fill transition-all ease-in-out' }}"
                wire:click="selectCategory({{ $item->id }})"
            >
                {{ $item->nama }}
            </button>
        @endforeach
    </div>

    @if($subCategories)
        <div wire:loading.remove wire:target="selectCategory"
             class="grid grid-rows-1 grid-flow-col gap-4 py-4 bg-white sticky top-28 z-10">
            @foreach($subCategories as $item)
                @php
                    $isActive = $selectedSubCategory == $item->id;
                @endphp

                <button
                    class="{{ $isActive ? 'py-3 text-center btn-color-fill font-semibold rounded-md hover:btn-color-outline hover:btn-color-fill-white transition-all ease-in-out' : 'py-3 text-center btn-color-outline font-semibold rounded-md hover:btn-color-fill transition-all ease-in-out' }}"
                    wire:click="selectSubCategory({{ $item->id }})"
                >
                    {{ $item->nama }}
                </button>
            @endforeach
        </div>
    @endif
    <div wire:loading wire:target="selectCategory, selectSubCategory" class="w-100 flex justify-center">

        <div aria-label="Loading..." role="status" class="flex items-center space-x-2">
            <svg class="h-20 w-20 animate-spin stroke-primary" viewBox="0 0 256 256">
                <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24"></line>
                <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24"></line>
                <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24">
                </line>
                <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24"></line>
                <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24">
                </line>
                <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24"></line>
                <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24"></line>
                <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="24">
                </line>
            </svg>
            <span class="text-4xl font-medium text-primary">Loading...</span>
        </div>
    </div>
    <div wire:loading.remove wire:target="selectSubCategory">
        <div id="art-item" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 my-5 z-[2]">
            @if(count($arts) > 0)
                @foreach($arts as $item)
                    <div
                        class="produk bg-white border shadow-md md:h-80 rounded-xl flex flex-col overflow-hidden group/belimobile group/profile font-poppins">
                        <div class="relative w-full h-3/5 z-[0]">
                            <a href="{{ route('art', $item->id) }}"
                               class="absolute text-white bottom-2 left-2 hidden md:flex gap-2 items-end translate-y-16 transition-all ease-in-out group-hover/profile:translate-y-0 backdrop-blur-sm rounded-lg">
                                <img class="size-10 object-cover rounded-full"
                                     src="{{ Str::startsWith($item->images[0], 'http') ? $item->images[0] : env('MEDIA_URL').'/'.$item->images[0] }}"
                                     alt="">
                                <p class="leading-none text-sm font-semibold drop-shadow-lg">{{ $item->seniman->username }}</p>
                            </a>
                            <img class="w-full object-cover object-center"
                                 src="{{ Str::startsWith($item->images[0], 'http') ? $item->images[0] : env('MEDIA_URL').'/'.$item->images[0] }}"
                                 alt="">
                        </div>
                        <div class="flex flex-col justify-between bg-white z-[1] group/beli">
                            <div class="flex flex-col p-2">
                                <div class="flex justify-between">
                                    <h1 class="text-base md:text-lg font-semibold cursor-default line-clamp-1">{{ $item->name }}</h1>
                                    <button id="wishlistButton">
                                        <i class="fa-regular fa-heart text-red-500"></i>
                                    </button>
                                </div>
                                <h1 class="text-sm md:text-xl font-bold leading-none cursor-default">
                                    {{ \App\Helpers\Universal::idr($item->price) }}</h1>
                                <div class="flex gap-1 items-center">
                                    <p class="text-xs md:text-sm text-slate-500 line-through cursor-default">Rp.
                                        1.000.000</p>
                                    <p class="py-1 text-xs bg-primary text-white px-2 rounded-full cursor-default">
                                        55%</p>
                                </div>
                            </div>
                            <div class="flex flex-col relative -mt-1">
                                <p class="p-2 text-xs md:text-base cursor-default">{{ $item->stock }} Stok</p>
                                <button wire:click="addToCart({{ $item->id }})"
                                        class="absolute py-1 w-4/6 bottom-2 right-1 translate-y-16 transition-all hidden md:inline ease-in-out group-hover/beli:translate-y-0 text-center btn-color-fill font-normal text-sm rounded-md">
                                    Beli
                                    <span class="hidden md:inline-flex">Sekarang</span></button>
                                <button wire:click="addToCart({{ $item->id }})"
                                        class="absolute py-1 w-4/6 bottom-2 right-1 translate-y-16 transition-all inline md:hidden ease-in-out group-hover/belimobile:translate-y-0 text-center btn-color-fill font-normal text-xs md:text-sm rounded-md">
                                    Beli
                                    <span class="hidden md:inline-flex">Sekarang</span></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
