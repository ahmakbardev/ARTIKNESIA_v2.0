<div class="relative">
    <label for="search" class="absolute top-1/2 -translate-y-1/2 left-4">
        <img src="{{ asset('images/icons/search.svg') }}" alt="">
    </label>
    <input type="text" name="search"
           class="border px-10 rounded-md py-2 w-full bg-gray-50 focus:outline-primary/50 text-sm"
           placeholder="Cari di Artiknesia"
           wire:model.live="query"
    />
    @if($query && $results->isNotEmpty())
        <div class="absolute left-0 mt-2 bg-white w-full drop-shadow-lg p-3 rounded-xl z-10">
            @foreach($results as $item)
                <div class="grid grid-cols-8 gap-3 items-center mb-3">
                    <div class="col-span-1">
                        <img src="https://artiknesia.com/seniman/storage/{{ $item->images[0]}}"
                             alt="{{ $item->title }}"
                             class="w-full object-cover rounded-xl"/>
                    </div>
                    <div class="col-span-7">
                        <h1 class="text-lg font-bold">{{ $item->name }}</h1>
                        <a href="{{ route('art', $item->id) }}" class="text-sm text-primary">Lihat lebih detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($query)
        <div class="absolute left-0 mt-2 bg-white w-full drop-shadow-lg p-3 rounded-xl z-10">
            <p class="text-sm text-gray-500">No results found.</p>
        </div>
    @endif
</div>
