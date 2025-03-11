@php
    $searchBy = ['By Karya', 'By Article'];
@endphp

<div class="relative">
    <div class="flex">
        <label for="search" class="absolute top-1/2 -translate-y-1/2 left-4">
            <img src="{{ asset('images/icons/search.svg') }}" alt="">
        </label>
        <input type="text" name="search"
            class="flex-1 rounded-s-md border bg-gray-50 px-10 py-2 text-sm focus:outline-primary/50"
            placeholder="Cari di Artiknesia" wire:model.live="query" />
        <div class="relative">
            <button class="rounded-e-md border bg-gray-50 pl-4 py-2 pr-10 text-sm text-neutral-400"
                wire:click="toggleSearchBy">
                @if (!$selectedItem)
                    Search By
                @else
                    {{ $selectedItem }}
                @endif
                <div class="absolute inset-y-0 end-0 flex items-center pe-2">
                    <img src="{{ asset('images/icons/caret-small-down.svg') }}" class="size-5" alt="">
                </div>
            </button>
            <div
                class="{{ $isOpen ? '' : 'hidden' }} absolute left-0 right-0 top-[calc(100%)] rounded border bg-gray-50 text-sm transition-all duration-300">
                <ul class="flex flex-col gap-0.5 p-0.5 text-start">
                    @foreach ($searchBy as $item)
                        <li class="cursor-pointer rounded px-4 py-2 text-neutral-400 hover:bg-primary hover:text-white"
                            wire:click="selectItem(
                            '{{ $item }}')">
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @if ($query && $results->isNotEmpty())
        @if ($selectedItem === 'By Karya' || !$selectedItem)
            <div wire:ignore x-ref="dropdown"
                class="absolute left-0 mt-2 bg-white w-full drop-shadow-lg p-3 rounded-xl z-10">
                @foreach ($results as $item)
                    <div class="grid grid-cols-8 gap-3 items-center mb-3">
                        <div class="col-span-1">
                            <img src="https://artiknesia.com/seniman/storage/{{ $item->images[0] }}"
                                alt="{{ $item->title }}" class="w-full object-cover rounded-xl" />
                        </div>
                        <div class="col-span-7">
                            <h1 class="text-lg font-bold">{{ $item->name }}</h1>
                            <a href="{{ route('art', $item->id) }}" class="text-sm text-primary">Lihat lebih detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="absolute left-0 mt-2 bg-white w-full drop-shadow-lg p-3 rounded-xl z-10">
                @foreach ($results as $item)
                    <div wire:ignore x-ref="dropdown"  class="grid grid-cols-8 gap-3 items-center mb-3">
                        <div class="col-span-1">
                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                                alt="{{ $item->title }}" class="w-full object-cover rounded-xl" />
                        </div>
                        <div class="col-span-7">
                            <h1 class="text-lg font-bold">{{ $item->title }}</h1>
                            <a href="{{ route('art', $item->id) }}" class="text-sm text-primary">Lihat lebih detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @elseif($query)
        <div class="absolute left-0 mt-2 bg-white w-full drop-shadow-lg p-3 rounded-xl z-10">
            <p class="text-sm text-gray-500">No results found.</p>
        </div>
    @endif
</div>

<script>
    document.addEventListener('click', function(event) {
        let dropdown = document.querySelector('[x-ref = "dropdown"]');
        let input = document.querySelector('[wire\\:model\\.live="query"]');

        if (dropdown && !dropdown.contains(event.target) && !input.contains(event.target)) {
            Livewire.dispatch('hideDropdown')

        }
    })
</script>
