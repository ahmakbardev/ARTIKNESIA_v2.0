@php
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
                    @foreach ($categories as $item)
                        <button type="button" wire:click="filterCategory('{{ $item->id }}', '{{ $item->name }}')"
                            class="{{ $statusFilterCategory && $categoryId == $item->id ? 'bg-primary text-white border-primary' : 'border-primary-darker' }} rounded-xl border px-2 py-1 font-poppins font-medium text-primary-darker hover:border-primary hover:bg-primary-darker hover:text-white">{{ $item->name }}</button>
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
                    <img src="{{ asset('images/icons/calendar.svg') }}" class="size-4" alt="">
                </div>
                <input type="text" id="datepicker-autohide" datepicker datepicker-autohide datepicker-buttons datepicker-format="yyyy/mm/dd" datepicker-autoselect-today
                       class="block w-full rounded-[0.625rem] border border-primary-darker bg-gray-50 py-[0.375rem] pl-8 text-sm text-primary-darker placeholder-primary placeholder:font-semibold focus:outline-primary-darker"
                       placeholder="Tanggal Terbit" wire:ignore readonly>
                <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center ps-3.5">
                    <img src="{{ asset('images/icons/arrow-right.svg') }}" class="mr-2 size-4" alt="">
                </div>
            </div>
        </div>

        {{-- Article List --}}
        <div class="flex-1 px-2 lg:px-0">
            @if ($categoryId)
                <h3 class="mb-3 text-lg lg:mb-9 border-b-2 border-primary pb-0.5">
                    Kategori : <strong>{{ $categoryName }}</strong>
                </h3>
            @else
                <h3 class="mb-3 text-lg font-bold lg:mb-9">Semua Artikel</h3>
            @endif
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3">
                @foreach ($articles as $item)
                    <a href="{{ route('article.show', $item->slug) }}"
                        class="flex flex-col overflow-hidden rounded-xl border bg-white font-poppins shadow-md">
                        <img class="h-52 w-full object-cover object-center"
                            {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}" --}}
                            src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="{{ $item->image_caption }}">
                        <div class="flex flex-1 flex-col justify-between gap-3 px-3 py-2 lg:p-4">
                            <h5 class="line-clamp-2 text-sm font-semibold leading-6 lg:text-lg">{{ $item->short_title }}</h5>
                            <div class="flex flex-row gap-3 text-[0.65rem] items-center justify-between md:gap-6">
                                <div class="flex items-center gap-2">
                                    <img class="w-5 rounded-full object-contain"
                                        src="{{ asset('images/profile/default.png') }}" alt="">
                                    <div class="flex flex-col">
                                        <p class="truncate">
                                            Oleh <span class="font-semibold">{{ $item->author->name }}</span>
                                        </p>
                                        <p>
                                            {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex gap-0.5 items-center text-neutral-500">
                                    <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                                    <p class="font-semibold self-end relative top-[0.035rem]">{{ \App\Helpers\Universal::formatViewCount($item->view_count) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $articles->links('vendor.pagination.tailwind') }}
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
