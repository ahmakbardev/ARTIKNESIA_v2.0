@extends('layouts.layout')
@section('title', 'ARTIKNESIA - '. $article->short_title)
@section('content')
    @php
        $shareIconImages = ['images/icons/linkedin-icon.svg', 'images/icons/instagram-icon.svg', 'images/icons/facebook-icon.svg', 'images/icons/copy.svg'];
    @endphp
    <div class="flex flex-col gap-y-3 relative max-w-[768px] mx-auto pt-10">
        {{-- share now --}}
        <div class="hidden xl:block absolute left-[calc(100%+1rem)] w-[235px] text-sm">
            <h4 class="font-poppins font-semibold mb-2">Share Now</h4>
            <div class="mb-16">
                <ul class="flex gap-4">
                    @foreach ($shareIconImages as $item)
                        <li>
                            <button onclick="copyURL()" data-tooltip-target="tooltip-click" data-tooltip-trigger="click">
                                <img src="{{ asset($item) }}" class="size-5" alt="">
                            </button>
                        </li>
                        @if ($item === 'images/icons/copy.svg')
                            <div id="tooltip-click" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Copied
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
            @include('components.carousel.article-carousel')
        </div>
        {{-- writed by --}}
        <div class="hidden xl:block absolute right-[calc(100%+1rem)] w-[235px] px-2 text-sm">
            <h4 class="font-poppins font-semibold mb-2">Ditulis Oleh</h4>
            <div class="flex items-center gap-2 border-b-2 border-[#D0D5DD] pb-6 mb-6 px-2">
                <img class="w-11 rounded-full object-contain"
                    src="{{ asset('images/profile/default.png') }}" alt="">
                <div class="flex flex-col">
                    <div class="truncate font-semibold">
                        {{ $article->author->name }}
                    </div>
                    <div class="font-medium">
                        Designer
                    </div>
                </div>
            </div>
            <div class="flex flex-row flex-wrap gap-x-1.5 gap-y-1 mb-3">
                @foreach($article->getTags() as $item)
                    <span class="text-white text-sm font-semibold bg-primary rounded-[0.625rem] px-2 py-1">#{{ $item }}</span>
                @endforeach
                
            </div>
            <div class="flex flex-row flex-wrap gap-x-1.5 gap-y-1">
                @foreach($article->categories as $item)
                    <span class="text-white text-sm font-semibold bg-primary rounded-[0.625rem] px-2 py-1">{{ $item }}</span>
                @endforeach
            </div>
        </div>

        {{-- Main Article --}}
        <div class="truncate max-w-64 text-sm font-poppins text-black/70"><a href="/" class="hover:underline">Home</a> > <a href="{{ route('article.index') }}" class="hover:underline">Artikel</a> > {{ $article->title }}</div>
        <h1 class="text-lg lg:text-5xl font-bold px-3 pt-2 md:px-0 md:pt-0 lg:leading-[1.3]">{{ $article->title }}</h1>
        <div class="flex gap-0.5 flex-row-reverse border-b border-t border-neutral-500 py-3 px-2 items-center my-3">
            <div class="self-end">
                {{ \App\Helpers\Universal::formatViewCount($article->view_count) }}
            </div>
            <div>
                <img src="{{ asset('images/icons/bar-chart-icon.svg') }}" class="size-8" alt="">
            </div>
        </div>
        <img class="max-sm:h-full object-cover w-full h-96 object-center rounded-sm lg:rounded-2xl mt-2 mb-3"
             {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}" --}}
             src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
             alt="">
        {{-- <div class="flex flex-row flex-wrap gap-3 px-3 md:px-0">
            @foreach($article->getTags() as $item)
                <span class="text-white text-sm font-semibold bg-primary rounded-md px-5 py-3">{{ $item }}</span>
            @endforeach
            @foreach($article->getCategories() as $item)
                <span class="text-white text-sm font-semibold bg-primary rounded-md px-5 py-3">{{ $item }}</span>
            @endforeach
        </div>
        <h6 class="px-3 md:px-0">Di tulis oleh: {{ $article->author->name }}</h6> --}}
        <div class="px-3 md:px-0">
            {!! $article->description !!}
        </div>
    </div>
@endsection

@section('custom-seo')
    <!-- Meta Title -->
    <meta name="title" content="{{ $article->short_title }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ $article->short_description }}">
    <!-- Meta Robots -->
    <meta name="robots" content="{{ $article->meta_robots }}"> <!-- Options: index, noindex, follow, nofollow -->
    <!-- Meta Language -->
    <meta http-equiv="Content-Language" content="{{ $article->language }}">
    <!-- Meta Keywords -->
    <meta name="keywords"
          content="{{ implode(',', $article->getTags()->toArray()) . ',' . implode(',', $article->getCategories()->toArray()) }}">

    <!-- Open Graph Meta Tags (For Social Media) -->
    <meta property="og:title" content="{{$article->short_title}}">
    <meta property="og:description" content="{{$article->short_description}}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="{{$article->short_title}}">
    <meta name="twitter:description" content="{{$article->short_description}}">
@endsection

<script>
    function copyURL() {
        navigator.clipboard.writeText(window.location.href)
    }
</script>