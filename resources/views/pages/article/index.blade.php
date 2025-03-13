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
                         {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($articles[0]->image) }}" --}}
                         src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                            <div class="flex gap-0.5 items-center text-neutral-500">
                                <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                                <p class="font-semibold self-end relative top-[0.035rem]">{{ \App\Helpers\Universal::formatViewCount($articles[0]->view_count) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-span-2 grid grid-cols-2 gap-3 sm:gap-6 lg:h-[20rem] lg:items-stretch">
                    @foreach ($articles->slice(1, 4) as $item)
                        <a href="{{ route('article.show', $item->slug) }}"
                           class="relative h-[13.3rem] overflow-hidden rounded-xl border font-poppins shadow-md">
                            <img class="h-full w-full object-cover object-center lg:h-60"
                                 {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}" --}}
                                 src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                 alt="{{ $item->image_caption }}">
                            <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/90 px-3 py-2">
                                <h5 class="mb-2 text-xs font-semibold">{{ $item->short_title }}</h5>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-1 md:gap-2">
                                        <img class="w-4 rounded-full object-contain md:w-6"
                                             src="{{ asset('images/profile/default.png') }}" alt="">
                                        <div>
                                            <p class="truncate text-[0.65rem] max-w-20 sm:max-w-32">Oleh {{ $item->author->name }}</p>
                                            <p class="text-[0.6rem]">
                                                {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex gap-0.5 items-center text-neutral-500">
                                        <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                                        <p class="font-semibold self-end relative top-[0.035rem] text-[0.65rem]">
                                            {{ \App\Helpers\Universal::formatViewCount($item->view_count) }}
                                        </p>
                                    </div>
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
