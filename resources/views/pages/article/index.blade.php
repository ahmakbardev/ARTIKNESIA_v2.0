@extends('layouts.layout')

@section('content')
    <div class="artikel my-10 flex flex-col px-2 md:px-5 lg:px-0 max-w-[1444px] mx-auto">
        <div class="px-2 lg:px-0">
            <h2 class="mb-10 text-3xl font-semibold">Artikel ARTIKNESIA</h2>
            <h2 class="text-md mb-8 w-max border-b-2 border-primary pb-0.5 pr-1">Artikel Populer Minggu ini!</h2>
            @include('components.article-page.top-articles')
        </div>
        <div>
            <livewire:article-search-filter-sort>
        </div>
    </div>
@endsection
