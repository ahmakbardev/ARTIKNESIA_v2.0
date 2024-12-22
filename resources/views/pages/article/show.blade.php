@extends('layouts.layout')
@section('title', 'ARTIKNESIA - '. $article->short_title)
@section('content')
    <div class="flex flex-col gap-y-3">
        <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
        <img class="max-sm:h-full object-cover w-full h-96 object-center rounded-none lg:rounded-2xl"
             src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
             alt="">
        <div class="flex flex-row flex-wrap gap-3">
            @foreach($article->getTags() as $item)
                <span class="text-white text-sm font-semibold bg-primary rounded-md px-5 py-3">{{ $item }}</span>
            @endforeach
            @foreach($article->getCategories() as $item)
                <span class="text-white text-sm font-semibold bg-primary rounded-md px-5 py-3">{{ $item }}</span>
            @endforeach
        </div>
        <h6>Di tulis oleh: {{ $article->author->name }}</h6>
        {!! $article->description !!}
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
