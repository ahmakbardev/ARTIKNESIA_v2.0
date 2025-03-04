@extends('layouts.layout')

@section('content')
    <div class="artikel px-2 md:px-5 lg:px-0 flex flex-col my-10">
        <div class="flex justify-between items-end">
            <h1 class="text-2xl font-semibold">Artikel ARTIKNESIA</h1>
        </div>
        <div >
            <livewire:article-search>
        </div>
    </div>
@endsection
