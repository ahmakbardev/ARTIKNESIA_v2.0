<div class="flex flex-col gap-3 w-full">
    <div class="grid grid-cols-3 md:flex gap-2 md:gap-5 border-b border-b-gray-300 w-full h-fit ">
        <button wire:click="setCity('')"
                class="border-b {{ !$city ? 'border-b-primary text-black' : 'text-gray-300' }} py-3 font-semibold">
            Semua Pameran
        </button>
        <button wire:click="setCity('malang')"
                class="py-3 font-semibold {{ $city === 'malang' ? 'border-b border-b-primary text-black' : 'text-gray-300' }}">
            Pameran di Malang
        </button>
        <button wire:click="setCity('batu')"
                class="py-3 font-semibold {{ $city === 'batu' ? 'border-b border-b-primary text-black' : 'text-gray-300' }}">
            Pameran di Batu
        </button>
    </div>

    <div class="flex flex-col gap-3">
        <div wire:loading.delay.shortest class="flex justify-center items-center h-[500px]">
            <div class="flex space-x-2 animate-pulse">
                <div class="w-3 h-3 bg-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full"></div>
                <div class="w-3 h-3 bg-primary rounded-full"></div>
            </div>
        </div>

        <div wire:loading.delay.remove class="grid  grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach($exhibitions as $item)
                <div class="rounded-lg border border-gray-300 flex flex-col gap-3">
                    <img src="{{\Illuminate\Support\Facades\Storage::url($item->banner)}}" alt="Pameran"
                         class="w-full object-cover rounded-t-lg"/>
                    <div class="p-3 flex flex-col justify-between gap-5 h-full">
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
                                <p class="text-xs">{{$item->formatted_date_range}}</p>
                            </div>
                        </div>
                        <div class="w-full h-fit rounded-lg grid grid-cols-2 justify-between items-center">
                            <p class="text-sm font-semibold">{{ $item->formatted_price }}</p>
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
