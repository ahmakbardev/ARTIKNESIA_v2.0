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
    <div class="relative mx-auto flex gap-y-3 pt-10">
        {{-- writed by --}}
        <div class="hidden w-1/6 text-xs xl:flex flex-col gap-4 sticky top-36 self-start">
            <h4 class="font-poppins font-semibold">Ditulis Oleh</h4>
            <div class="flex items-center gap-2 px-2">
                <img class="w-9 rounded-full object-contain"
                     src="{{ asset('images/profile/default.png') }}" alt="">
                <div>
                    <div class="truncate font-semibold">
                        {{ $article->author->name }}
                    </div>
                </div>
            </div>
           
            {{-- <div class="mb-3 flex flex-row flex-wrap gap-x-1.5 gap-y-1">
                @foreach ($article->getTags() as $item)
                    <span class="rounded-[0.625rem] bg-primary px-2 py-1 text-xs font-semibold text-white">#{{ $item }}</span>
                @endforeach
            </div>
            <div class="flex flex-row flex-wrap gap-x-1.5 gap-y-1">
                @foreach ($article->getCategories() as $item)
                    <span class="rounded-[0.625rem] bg-primary px-2 py-1 text-xs font-semibold text-white">{{ $item }}</span>
                @endforeach
            </div> --}}
        </div>

        {{-- Main Article --}}
        <div class="flex-1 px-2 lg:ml-8 lg:mr-12 lg:px-0">
            <div class="max-w-64 truncate font-poppins text-xs text-black/70">
                <a href="/" class="hover:underline">Home</a> > <a href="{{ route('article.index') }}" class="hover:underline">Artikel</a> > {{ $article->title }}
            </div>
            <h1 class="pt-2 text-lg font-bold md:px-0 md:pt-2 lg:text-5xl lg:leading-[1.3]">{{ $article->title }}</h1>
            <div class="my-6 flex items-center justify-between gap-0.5 border-y border-neutral-200 pr-3 py-4 font-poppins">
                <p class="text-sm text-neutral-9hp00 md:px-0">Published at {{ \Illuminate\Support\Carbon::parse($article->created_at)->format('M d, Y H.i') }} by
                    {{ $article->author->name }}
                </p>
                <div class="flex items-center flex-row-reverse gap-1 text-neutral-700">
                    <div class="self-end text-sm">
                        {{ \App\Helpers\Universal::formatViewCount($article->view_count) }}
                    </div>
                    <div>
                        <img src="{{ asset('images/icons/eye-icon.svg') }}" class="size-5" alt="">
                    </div>
                </div>
            </div>
            <img class="mb-7 mt-2 h-96 w-full rounded-sm object-cover object-center max-sm:max-h-64 lg:rounded-2xl"
                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                 alt="">
            <div class="px-3 text-justify md:px-0">
                {!! $article->description !!}
            </div>
        </div>

        {{-- share now --}}
        <div class="hidden w-1/4 text-xs xl:block sticky top-36 self-start">
            <h4 class="mb-3 font-poppins font-semibold">Share Now</h4>
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
            {{-- @include('components.carousel.posters-carousel') --}}
        </div>
    </div>
    <livewire:article-recommend :article="$article" />
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
