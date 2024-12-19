@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center">
        <div class="p-5 flex flex-col items-center gap-y-8">
            <img src="{{ asset('images/logo/artiknesia.svg') }}" alt="Artiknesia" class="w-1/2"/>
            <h1 class="text-7xl font-bold text-center text-primary">Coming Soon</h1>
            <a href="/" class="text-black text-sm">Kembali</a>
        </div>
    </div>
@endsection
