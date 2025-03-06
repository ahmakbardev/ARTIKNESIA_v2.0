@extends('layouts.layout')

@section('content')
    <div class="artikel px-2 md:px-5 lg:px-0 flex flex-col my-10">
        <div class="flex justify-between items-end">
            <h1 class="text-2xl font-semibold">Artikel ARTIKNESIA</h1>
        </div>
        <div >
{{-- 
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5 my-5">
                @foreach ($articles as $item)
                    <a href="{{ route('article.show', $item->slug) }}"
                       class="bg-white border shadow-md h-fit rounded-xl flex flex-col overflow-hidden font-poppins">
                        <img class="w-full h-52 object-cover object-center"
                             src="{{  \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                             alt="{{ $item->image_caption }}">
                        <div class="flex flex-col p-2 justify-between h-32">
                            <h1 class="text-sm lg:text-lg line-clamp-2 font-semibold leading-6">{{ $item->short_title }}</h1>
                            <div class="flex gap-2 md:gap-4 items-center">
                                <img class="w-8 md:w-12 rounded-full object-contain"
                                     src="{{ asset('images/profile/default.png') }}" alt="">
                                <div class="flex flex-col max-md:mt-3">
                                    <p class="text-xs md:text-sm font-semibold truncate">{{ $item->author->name }}</p>
                                    <p class="text-xs">{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div> --}}
            <livewire:article-search-filter-sort>
            {{-- <livewire:article-search>
            <livewire:article-sorting> --}}
        </div>
    </div>
@endsection
