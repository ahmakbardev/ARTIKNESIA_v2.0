<div>
    <div class="bg-white">
        <div class="artikel container mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-wrap mb-5">

                {{-- Search  Form --}}
                <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari artikel...">
                {{-- End Search Form --}}


                {{-- Filter By --}}
                <select wire:model.live="filterYear">
                    <option value="">Pilih Tahun</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
                
                <select wire:model.live="filterMonth">
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <!-- dst sampai 12 -->
                </select>
                {{-- End Filter By --}}


                {{-- Sort By Form --}}
                <button wire:click="sortBy('created_at')" class="mr-3 mb-2 px-4 py-2 bg-white hover:bg-gray-50 text-gray-800 font-medium rounded-lg border border-gray-200 shadow-sm flex items-center">
                    Terbaru
                    @if ($sortField === 'created_at')
                        <span class="ml-1">
                            @if ($sortDirection === 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            @endif
                        </span>
                    @endif
                </button>
                
                <button wire:click="sortBy('view_count')" class="mr-3 mb-2 px-4 py-2 bg-white hover:bg-gray-50 text-gray-800 font-medium rounded-lg border border-gray-200 shadow-sm flex items-center">
                    Populer
                    @if ($sortField === 'view_count')
                        <span class="ml-1">
                            @if ($sortDirection === 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            @endif
                        </span>
                    @endif
                </button>
                
                <button wire:click="sortBy('title')" class="mb-2 px-4 py-2 bg-white hover:bg-gray-50 text-gray-800 font-medium rounded-lg border border-gray-200 shadow-sm flex items-center">
                    Judul
                    @if ($sortField === 'title')
                        <span class="ml-1">
                            @if ($sortDirection === 'asc')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            @endif
                        </span>
                    @endif
                </button>
                {{-- End Sort Form --}}
            </div>       
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-5">
                @foreach ($articles as $item)
                    <a href="{{ route('article.show', $item->slug) }}"
                       class="bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow transition-shadow h-full flex flex-col">
                        <div class="w-full h-40 sm:h-44 overflow-hidden">
                            <img class="w-full h-full object-cover object-center"
                                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                                 alt="{{ $item->image_caption }}">
                        </div>
                        <div class="flex flex-col p-3 flex-grow">
                            <h3 class="text-sm font-semibold mb-2 line-clamp-2">{{ $item->short_title }} {{ $item->view_count }}</h3>
                            <div class="mt-auto flex items-center gap-2">
                                <img class="w-8 h-8 rounded-full object-cover"
                                     src="{{ asset('images/profile/default.png') }}" alt="Profile">
                                <div class="flex flex-col">
                                    <p class="text-xs font-medium text-gray-900 truncate">{{ $item->author->name }}</p>
                                    <p class="text-xs text-gray-500">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
