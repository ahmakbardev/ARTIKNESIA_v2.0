@php
    $isSlider = count($cities) > 3;
@endphp

<div class="flex w-full flex-col gap-4">
    <div id="{{ $isSlider ? 'cityScroll' : '' }}" class="{{ $isSlider ? 'overflow-x-scroll hide-scrollbar' : '' }} w-full border-b border-b-black font-medium text-black">
        <div class="{{ $isSlider ? 'w-max' : 'grid grid-cols-2' }} md:flex">
            <!-- Filter Kota -->
            <button wire:click="setCity('')"
                    class="{{ !$city ? 'border-b-4 border-b-black font-bold' : '' }} {{ $isSlider ? 'md:min-w-[250px] px-6 py-3' : 'flex-1 px-5 py-3' }}">
                Semua Pameran
            </button>
            @foreach ($cities as $item)
                <button wire:click="setCity('{{ $item->city }}')"
                        class="{{ $city === $item->city ? 'border-b-4 border-b-black font-bold' : '' }} {{ $isSlider ? 'md:min-w-[250px] px-6 py-3' : 'flex-1 px-5 py-3' }}">
                    <span class="capitalize">{{ $item->city }}</span>
                </button>
            @endforeach
        </div>
    </div>
    <div class="my-4 flex flex-col justify-between gap-4 md:flex-row md:gap-2">
        <!-- Filter Kategori -->
        <div class="flex flex-wrap items-center gap-3 md:w-3/4 md:gap-4">
            <button wire:click="setCategory('')"
                    class="{{ !$category ? 'bg-[#E0B745] text-white' : 'bg-transparent text-primary' }} rounded-[0.625rem] border border-[#E0B745] px-2 py-1 font-poppins text-xs font-semibold">
                Semua Kategori
            </button>
            @foreach ($categories as $item)
                <button wire:click="setCategory('{{ $item->category }}')"
                        class="{{ $category === $item->category ? 'bg-[#E0B745] text-white' : 'bg-transparent text-primary' }} rounded-[0.625rem] border border-[#E0B745] px-2 py-1 font-poppins text-xs font-semibold">
                    {{ ucfirst($item->category) }}
                </button>
            @endforeach
            @if ($categoryLimit < $categoryCount)
                <button wire:click="seeMoreCategory" class="flex items-center gap-0.5 rounded-[0.625rem] border border-primary bg-white p-1">
                    <div class="size-1 rounded-full bg-primary"></div>
                    <div class="size-1 rounded-full bg-primary"></div>
                    <div class="size-1 rounded-full bg-primary"></div>
                </button>
            @endif
        </div>

        <!-- Filter Waktu -->
        <div class="flex items-center gap-3 self-start">
            <img src="{{ asset('images/icons/calendar-exhibition-icon.svg') }}" class="size-5" alt="">
            <button wire:click="setSortDate('asc')"
                    class="{{ $sortDate === 'asc' ? 'bg-[#E0B745] text-white ' : ' text-primary' }} rounded-[0.625rem] border border-[#E0B745] px-2 py-1 font-poppins text-xs font-semibold">
                Terdekat
            </button>
            <button wire:click="setSortDate('desc')"
                    class="{{ $sortDate === 'desc' ? 'bg-[#E0B745] text-white' : 'bg-transparent text-primary' }} rounded-[0.625rem] border border-[#E0B745] px-2 py-1 font-poppins text-xs font-semibold">
                Terjauh
            </button>
        </div>
    </div>


    <div class="flex flex-col gap-3">
        <div wire:loading.delay.shortest class="flex items-center justify-center self-center">
            <div class="flex h-fit w-fit animate-pulse space-x-2">
                <div class="h-3 w-3 rounded-full bg-primary"></div>
                <div class="h-3 w-3 rounded-full bg-primary"></div>
                <div class="h-3 w-3 rounded-full bg-primary"></div>
            </div>
        </div>
        @if (count($exhibitions) === 0)
            <div class="flex flex-col rounded-xl">
                <div class="flex h-[100px] w-full items-center justify-center rounded-t-lg">
                    <p class="font-poppins text-xl font-semibold text-primary drop-shadow">
                        Tidak ada pameran yang tersedia
                    </p>
                </div>
            </div>
        @endif
        <div wire:loading.delay.remove class="grid grid-cols-1 gap-10 md:grid-cols-2 xl:grid-cols-4">

            @foreach ($exhibitions as $item)
                <div class="flex flex-col rounded-xl shadow-[4px_4px_4px_rgba(0,0,0,0.25)]">
                    {{-- <img src="http://127.0.0.1:8000/storage/{{ $item->banner }}" http://127.0.0.1:8000/storage/{{ $exhibition->banner }}
                        \Illuminate\Support\Facades\Storage::url($item->banner) alt="Pameran"
                        class="w-full h-[200px] object-cover rounded-t-lg bg-black" /> --}}
                    <img src="https://images.unsplash.com/photo-1582555172866-f73bb12a2ab3?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Pameran"
                         class="h-[200px] w-full rounded-t-lg bg-black object-cover" />
                    <div class="flex flex-1 flex-col justify-between px-5 py-4">
                        <div class="group">
                            <a href="{{ route('exhibition.show', $item->slug) }}"
                               class="line-clamp-1 font-poppins text-lg font-bold transition-all duration-300 group-hover:line-clamp-none">{{ $item->name }}</a>
                        </div>
                        <div class="mt-2 flex flex-col gap-3">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/icons/location-icon.svg') }}" class="size-4" alt="">
                                <p class="font-poppins text-xs capitalize">{{ $item->city }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/icons/calendar-exhibition-icon.svg') }}" class="size-4" alt="">
                                <p class="font-poppins text-xs">{{ $item->formatted_date_range }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('images/icons/money-icon.svg') }}" class="size-4" alt="">
                                <p class="font-poppins text-xs">{{ $item->formatted_price }}</p>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-1.5 rounded-lg">
                            <div class="rounded-[0.625rem] bg-[#E0B745] px-2 py-1 font-poppins text-xs font-semibold capitalize text-white">{{ $item->category }}</div>
                            <div class="{{ $item->status == 'completed' ? 'bg-status-completed' : ($item->status == 'ongoing' ? 'bg-status-ongoing' : 'bg-status-upcoming') }} rounded-[0.625rem] px-2 py-1 font-poppins text-xs font-semibold capitalize text-white">
                                {{ $item->status === 'completed' ? 'Tutup' : ($item->status == 'ongoing' ? 'Berlangsung' : 'Segera Datang') }}</div>
                            {{-- <a href="{{ $item->status != 'completed' ? $item->link : 'javascript:void(0)' }}"
                                class="bg-primary text-center text-base text-white font-normal px-0 py-1 rounded-lg transition-colors ">
                                {{ $item->status != 'completed' ? 'Beli Sekarang' : 'Tutup' }}
                            </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div wire:loading.delay.remove class="mt-6 flex items-center justify-center">
            {{ $exhibitions->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

<script>
    const scrollContainer = document.getElementById('cityScroll');
    let isDown = false;
    let isDragging = false;
    let startX;
    let scrollLeft;

    scrollContainer.addEventListener('mousedown', (e) => {
        isDown = true;
        isDragging = false;
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX);
        if (Math.abs(walk) > 5) isDragging = true; // hanya dianggap drag kalau gesernya > 5px
        scrollContainer.scrollLeft = scrollLeft - walk;
    });

    scrollContainer.addEventListener('mouseup', () => {
        isDown = false;
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isDown = false;
    });

    // Blokir click jika sedang dragging
    scrollContainer.querySelectorAll('button').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            if (isDragging) {
                e.preventDefault();
                e.stopImmediatePropagation();
            }
        });
    });
</script>
