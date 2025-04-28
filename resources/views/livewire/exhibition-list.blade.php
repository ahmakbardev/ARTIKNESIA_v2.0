<div class="flex flex-col gap-3 w-full">
    <div class="grid grid-cols-3 md:flex gap-2 md:gap-5 border-b border-b-gray-300 w-full h-fit ">
        <!-- Filter Kota -->
        <button wire:click="setCity('')"
            class="border-b {{ !$city ? 'border-b-primary text-black' : 'text-gray-300' }} py-3 font-semibold">
            Semua Pameran
        </button>
        @foreach ($cities as $item)
            <button wire:click="setCity('{{ $item->city }}')"
                class="py-3 font-semibold {{ $city === $item->city ? 'border-b border-b-primary text-black' : 'text-gray-300' }}">
                Pameran di <span class="capitalize">{{ $item->city }}</span>
            </button>
        @endforeach
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap gap-2 py-3">
        <button wire:click="setCategory('')"
            class="text-sm px-3 py-1 rounded border {{ !$category ? 'bg-primary text-white' : 'bg-gray-200 text-gray-600' }}">
            Semua Kategori
        </button>
        @foreach ($categories as $item)
            <button wire:click="setCategory('{{ $item->category }}')"
                class="text-sm px-3 py-1 rounded border {{ $category === $item->category ? 'bg-primary text-white' : 'bg-gray-200 text-gray-600' }}">
                {{ ucfirst($item->category) }}
            </button>
        @endforeach
    </div>

    <!-- Filter Waktu -->
    <div class="flex gap-3 mb-3">
        <button wire:click="setSortDate('asc')"
            class="text-sm px-3 py-1 rounded border {{ $sortDate === 'asc' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-600' }}">
            Sebentar Lagi
        </button>
        <button wire:click="setSortDate('desc')"
            class="text-sm px-3 py-1 rounded border {{ $sortDate === 'desc' ? 'bg-primary text-white' : 'bg-gray-200 text-gray-600' }}">
            Masih Lama
        </button>
    </div>

    <div class="flex flex-col gap-3 items-center justify-center min-h-[500px] ">
        <div wire:loading.delay.shortest class="flex justify-center items-center">
            <div class="flex space-x-2 animate-pulse w-fit h-fit">
                <div class="w-3 h-3 bg-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full"></div>
            </div>
        </div>

        <div wire:loading.delay.remove class="grid  grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
            @foreach ($exhibitions as $item)
                <div class="rounded-lg border border-gray-300 flex flex-col gap-3 h-[400px] justify-between">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item->banner) }}" alt="Pameran"
                        class="w-full h-[200px] object-cover rounded-t-lg bg-black" />
                    <div class="p-3 flex flex-col justify-between gap-5 h-[200px]">
                        <div class="group">
                            <a href="{{ route('exhibition.show', $item->slug) }}"
                                class="font-semibold text-lg line-clamp-1 group-hover:line-clamp-none transition-all duration-300">{{ $item->name }}</a>
                        </div>
                        <div>
                            <div class="flex items-center gap-4">
                                <i class="fas fa-solid fa-location-dot text-lg"></i>
                                <p class="text-xs">{{ $item->address }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <i class="fas fa-regular fa-calendar-days text-lg"></i>
                                <p class="text-xs">{{ $item->formatted_date_range }}</p>
                            </div>
                        </div>
                        <div class="w-full h-fit rounded-lg grid grid-cols-2 justify-between items-center">
                            <p class="text-sm font-semibold">{{ $item->formatted_price }}</p>
                            <p class="text-sm font-semibold">{{ $item->status }}</p>
                            <a href="{{ $item->link }}"
                                class="bg-primary text-center text-sm text-white font-normal px-0 py-1 rounded-lg">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div wire:loading.delay.remove class="flex items-center justify-center">
            {{ $exhibitions->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
