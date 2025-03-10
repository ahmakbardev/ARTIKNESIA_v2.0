@extends('layouts.layout')

@section('content')
    <div class="artikel my-10 flex flex-col px-2 md:px-5 lg:px-0">
        <div>
            <h2 class="mb-10 text-3xl font-semibold">Artikel ARTIKNESIA</h2>
            <h2 class="text-md mb-8 w-max border-b-2 border-primary pb-0.5 pr-1">Artikel Populer Minggu ini!</h2>
            <div class="mb-10 grid grid-cols-2 gap-3 border-b-2 border-neutral-400 pb-10 md:gap-10 lg:grid-cols-4 lg:items-stretch lg:gap-7">
                <a href="{{ route('article.show', $articles[0]->slug) }}"
                   class="relative col-span-2 h-[28rem] overflow-hidden rounded-xl border font-poppins shadow-md">
                    <img class="h-full w-full object-cover object-center"
                         src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($articles[0]->image) }}"
                         alt="{{ $articles[0]->image_caption }}">
                    <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/70 px-5 py-3 lg:px-7">
                        <h5 class="md:text-md mb-2 font-semibold">{{ $articles[0]->short_title }}</h5>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 md:gap-4">
                                <img class="w-8 rounded-full object-contain md:w-8"
                                     src="{{ asset('images/profile/default.png') }}" alt="">
                                <p class="truncate text-xs md:text-sm">Oleh {{ $articles[0]->author->name }}</p>
                            </div>
                            <p class="text-xs md:text-sm">
                                {{ \Illuminate\Support\Carbon::parse($articles[0]->created_at)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </a>
                <div class="col-span-2 grid grid-cols-2 gap-6 lg:h-[20rem] lg:items-stretch">
                    @foreach ($articles->slice(1, 4) as $item)
                        <a href="{{ route('article.show', $item->slug) }}"
                           class="relative h-[13.3rem] overflow-hidden rounded-xl border font-poppins shadow-md">
                            <img class="h-full w-full object-cover object-center lg:h-60"
                                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($articles[0]->image) }}"
                                 alt="{{ $item->image_caption }}">
                            <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/70 px-3 py-2 md:py-3">
                                <h5 class="mb-2 text-xs font-semibold md:text-sm">{{ $item->short_title }}</h5>
                                <div class="flex items-center justify-between text-[0.65rem] md:text-xs">
                                    <div class="flex items-center gap-2 md:gap-2">
                                        <img class="w-4 rounded-full object-contain md:w-5"
                                             src="{{ asset('images/profile/default.png') }}" alt="">
                                        <p class="max-w-20 truncate sm:max-w-none md:max-w-none lg:max-w-[7.5rem]">
                                            Oleh {{ $item->author->name }}
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
            </div>
        </div>
        <div>
            <livewire:article-search-filter-sort>
        </div>
    </div>
@endsection
