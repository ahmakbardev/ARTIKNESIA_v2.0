@php
    $tags = ['Art', 'Paint', 'Therapy', 'Film', 'Invest', 'Educational', 'Inspirational', 'Promotional'];
    $sortingOptions = ['Terbaru', 'Terlama', 'Populer'];
@endphp
<div>
    <div class="artikel flex flex-col gap-7 lg:flex-row lg:px-0">

        {{-- Filter/Sort --}}
        <div class="mx-auto w-[17.5rem] self-start rounded-lg border border-neutral-400 bg-neutral-50 p-4 lg:mx-0">
            <div class="mb-4 flex items-center">
                <img src="{{ asset('images/icons/filter.svg') }}" class="mr-2 size-6" alt="">
                <h4 class="w-full border-b-2 border-primary text-xl font-semibold">Filter</h4>
            </div>
            <div class="mb-8 text-[0.75rem]">
                <h6 class="mb-1.5 font-medium">Kategori</h6>
                <div class="flex flex-wrap gap-1.5">
                    @foreach ($tags as $item)
                        <button class="rounded-xl border border-primary-darker px-2 py-1 font-poppins text-primary-darker">{{ $item }}</button>
                    @endforeach
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <img src="{{ asset('images/icons/sorting.svg') }}" class="mr-2 size-6" alt="">
                <h4 class="w-full border-b-2 border-primary text-xl font-semibold">Urutkan</h4>
            </div>
            <div class="mb-4 flex justify-between text-[0.875rem]">
                @foreach ($sortingOptions as $item)
                    <button wire:click="sortBy('{{ strtolower($item) }}')"
                            class="{{ $activeSort === strtolower($item) ? 'bg-primary text-white border-primary' : 'border-primary-darker' }} rounded-xl border px-2 py-1 font-poppins font-medium text-primary-darker hover:border-primary hover:bg-primary-darker hover:text-white">{{ $item }}</button>
                @endforeach
            </div>
            {{-- Datepicker --}}
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3.5">
                    <img src="{{ asset('images/icons/calendar.svg') }}" class="mb-1 mr-3 size-6" alt="">
                </div>
                <input type="text" id="datepicker-autohide" datepicker datepicker-autohide datepicker-buttons datepicker-format="yyyy/mm/dd" primary="white" datepicker-autoselect-today
                       class="block w-full rounded-xl border border-primary-darker bg-gray-50 p-2.5 ps-10 text-sm text-primary-darker placeholder-primary placeholder:font-semibold focus:outline-primary-darker"
                       placeholder="Tanggal Terbit" wire:ignore readonly>
                <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center ps-3.5">
                    <img src="{{ asset('images/icons/arrow-right.svg') }}" class="mr-2 size-5" alt="">
                </div>
            </div>
        </div>

        {{-- Article List --}}
        <div class="flex-1 px-2 lg:px-0">
            <h3 class="mb-3 text-lg font-bold lg:mb-9">Semua Artikel</h3>
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $item)
                    <a href="{{ route('article.show', $item->slug) }}"
                       class="flex flex-col overflow-hidden rounded-xl border bg-white font-poppins shadow-md">
                        <img class="h-52 w-full object-cover object-center"
                             src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                             alt="{{ $item->image_caption }}">
                        <div class="flex flex-1 flex-col justify-between gap-5 p-5 lg:gap-3 lg:p-4">
                            <h1 class="line-clamp-2 text-lg font-semibold leading-6">{{ $item->short_title }}</h1>
                            <div class="flex items-center justify-between gap-6 text-sm lg:gap-3 lg:text-[0.65rem]">
                                <div class="flex items-center gap-2 md:gap-2">
                                    <img class="w-4 rounded-full object-contain md:w-5"
                                         src="{{ asset('images/profile/default.png') }}" alt="">
                                    <p class="max-w-none truncate sm:max-w-32">
                                        Oleh <span class="font-semibold">{{ $item->author->name }}</span>
                                    </p>
                                </div>
                                <p>
                                    {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $articles->links('pagination::tailwind') }}
            </div>
        </div>

    </div>

</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const datepickerEl = document.getElementById('datepicker-autohide');
        const datepicker = new window.Datepicker(datepickerEl);

        // data tanggal dikirim ke komponen livewire
        datepickerEl.addEventListener('changeDate', function(e) {
            Livewire.dispatch('updateFilterDate', {
                date: e.target.value
            });
        })
    });
</script>
