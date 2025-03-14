@extends('layouts.layout')
@section('title', 'ARTIKNESIA - ' . $article->short_title)
@section('content')
    @php
        $shareIconImages = [
            [
                'icon_path' => 'images/icons/linkedin-icon.svg',
                'func_name' => "shareToSocialMedia('linkedin')",
            ],
            [
                'icon_path' => 'images/icons/facebook-icon.svg',
                'func_name' => "shareToSocialMedia('facebook')",
            ],
            [
                'icon_path' => 'images/icons/copy.svg',
                'func_name' => 'copyURL()',
            ],
        ];
    @endphp
    <div class="relative mx-auto flex max-w-[768px] flex-col gap-y-3 pt-10">
        {{-- share now --}}
        <div class="absolute left-[calc(100%+1rem)] hidden w-[235px] text-sm xl:block">
            <h4 class="mb-2 font-poppins font-semibold">Share Now</h4>
            <div class="mb-16">
                <ul class="flex gap-4">
                    @foreach ($shareIconImages as $item)
                        <li>
                            <button onclick="{{ $item['func_name'] }}" data-tooltip-target="tooltip-click" data-tooltip-trigger="click">
                                <img src="{{ asset($item['icon_path']) }}" class="size-5" alt="">
                            </button>
                        </li>
                        @if ($item['icon_path'] === 'images/icons/copy.svg')
                            <div id="tooltip-click" role="tooltip" class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                Copied
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    @endforeach
                </ul>
            </div>
            {{-- @include('components.carousel.article-carousel') --}}
            <livewire:article-recommend :article="$article" />
        </div>
        {{-- writed by --}}
        <div class="absolute right-[calc(100%+1rem)] hidden w-[235px] px-2 text-sm xl:block">
            <h4 class="mb-2 font-poppins font-semibold">Ditulis Oleh</h4>
            <div class="mb-6 flex items-center gap-2 border-b-2 border-[#D0D5DD] px-2 pb-6">
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
            <div class="mb-3 flex flex-row flex-wrap gap-x-1.5 gap-y-1">
                @foreach ($article->getTags() as $item)
                    <span class="rounded-[0.625rem] bg-primary px-2 py-1 text-sm font-semibold text-white">#{{ $item }}</span>
                @endforeach

            </div>
            <div class="flex flex-row flex-wrap gap-x-1.5 gap-y-1">
                @foreach ($article->getCategories() as $item)
                    <span class="rounded-[0.625rem] bg-primary px-2 py-1 text-sm font-semibold text-white">{{ $item }}</span>
                @endforeach
            </div>
        </div>

        {{-- Main Article --}}
        <div class="max-w-64 truncate font-poppins text-sm text-black/70">
            <a href="/" class="hover:underline">Home</a> > <a href="{{ route('article.index') }}" class="hover:underline">Artikel</a> > {{ $article->title }}
        </div>
        <h1 class="px-3 pt-2 text-lg font-bold md:px-0 md:pt-0 lg:text-5xl lg:leading-[1.3]">{{ $article->title }}</h1>
        <div class="my-3 flex flex-row-reverse items-center gap-0.5 border-b border-t border-neutral-500 px-2 py-3">
            <div class="self-end">
                {{ \App\Helpers\Universal::formatViewCount($article->view_count) }}
            </div>
            <div>
                <img src="{{ asset('images/icons/bar-chart-icon.svg') }}" class="size-8" alt="">
            </div>
        </div>
        <img class="mb-3 mt-2 h-96 w-full rounded-sm object-cover object-center max-sm:h-full lg:rounded-2xl"
             {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}" --}}
             src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
             alt="">
        {{-- <div class="flex flex-row flex-wrap gap-3 px-3 md:px-0">
            @foreach ($article->getTags() as $item)
                <span class="text-white text-sm font-semibold bg-primary rounded-md px-5 py-3">{{ $item }}</span>
            @endforeach
            @foreach ($article->getCategories() as $item)
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
    <meta property="og:title" content="{{ $article->short_title }}">
    <meta property="og:description" content="{{ $article->short_description }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="{{ $article->short_title }}">
    <meta name="twitter:description" content="{{ $article->short_description }}">
@endsection

<script>
    function copyURL() {
        navigator.clipboard.writeText(window.location.href)
    }

    function shareToSocialMedia(socialMedia) {
        const currentURL = encodeURIComponent(window.location.href);

        let shareURL;
        switch (socialMedia) {
            case 'facebook':
                shareURL = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;
                break;
            case 'linkedin':
                shareURL = `https://www.linkedin.com/sharing/share-offsite/?url=${currentURL}`;
                break;
            default:
                throw new Error('Invalid social media');
                break;
        }
        window.open(shareURL, '_blank');
    }
</script>
