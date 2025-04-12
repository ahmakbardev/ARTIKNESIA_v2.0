
<div class="lg:grid-cols-[5.5fr_3fr_4fr] mb-10 grid grid-cols-1 gap-5 border-b-2 border-neutral-400 pb-10 md:gap-10 lg:items-stretch lg:gap-6">
    <!-- Kolom 1 (5.5/12.5) - 1 Data -->
    <div>
        <a href="{{ route('article.show', $articles[0]->slug) }}"
           class="relative col-span-2 block overflow-hidden rounded-xl border font-poppins shadow-md h-96 lg:h-[31.25rem]">
            <img class="h-full w-full object-cover object-center"
                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($articles[0]->image) }}"
                 alt="{{ $articles[0]->image_caption }}">
            <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/90 px-5 py-3 lg:px-7">
                <h5 class="md:text-md mb-2 font-semibold">{{ $articles[0]->short_title }}</h5>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 md:gap-4">
                        <img class="w-8 rounded-full object-contain md:w-8"
                             src="{{ asset('images/profile/default.png') }}" alt="">
                        <div>
                            <p class="truncate text-xs md:text-sm">Oleh {{ $articles[0]->author->name }}</p>
                            <p class="text-[0.7rem] md:text-[0.8rem]">
                                {{ \Illuminate\Support\Carbon::parse($articles[0]->created_at)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-0.5 text-neutral-500">
                        <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                        <p class="relative top-[0.035rem] self-end font-semibold">{{ \App\Helpers\Universal::formatViewCount($articles[0]->view_count) }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Kolom 2 (3/12.5) - 2 Data -->
    <div class="grid grid-cols-2 lg:grid-cols-1 gap-5">
        @foreach ($articles->slice(1, 2) as $item)
            <a href="{{ route('article.show', $item->slug) }}"
               class="relative block h-72 overflow-hidden rounded-xl border font-poppins shadow-md lg:h-60">
                <img class="h-full w-full object-cover object-center"
                     src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                     alt="{{ $item->image_caption }}">
                <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/85 px-3 py-2">
                    <h5 class="mb-2 text-xs font-semibold">{{ $item->short_title }}</h5>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 md:gap-2">
                            <img class="w-4 rounded-full object-contain md:w-6"
                                 src="{{ asset('images/profile/default.png') }}" alt="">
                            <div>
                                <p class="max-w-20 truncate text-[0.65rem] sm:max-w-32">Oleh {{ $item->author->name }}</p>
                                <p class="text-[0.6rem]">
                                    {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-0.5 text-neutral-500">
                            <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                            <p class="relative top-[0.035rem] self-end text-[0.65rem] font-semibold">
                                {{ \App\Helpers\Universal::formatViewCount($item->view_count) }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Kolom 3 (4/12.5) - 2 Data -->
    <div class="grid grid-cols-2 lg:grid-cols-1 gap-5">
        @foreach ($articles->slice(3, 4) as $item)
            <a href="{{ route('article.show', $item->slug) }}"
               class="relative block h-72 overflow-hidden rounded-xl border font-poppins shadow-md lg:h-60">
                <img class="h-full w-full object-cover object-center lg:h-60"
                     src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                     alt="{{ $item->image_caption }}">
                <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/85 px-3 py-2">
                    <h5 class="mb-2 text-xs font-semibold">{{ $item->short_title }}</h5>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 md:gap-2">
                            <img class="w-4 rounded-full object-contain md:w-6"
                                 src="{{ asset('images/profile/default.png') }}" alt="">
                            <div>
                                <p class="max-w-20 truncate text-[0.65rem] sm:max-w-32">Oleh {{ $item->author->name }}</p>
                                <p class="text-[0.6rem]">
                                    {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-0.5 text-neutral-500">
                            <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                            <p class="relative top-[0.035rem] self-end text-[0.65rem] font-semibold">
                                {{ \App\Helpers\Universal::formatViewCount($item->view_count) }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
