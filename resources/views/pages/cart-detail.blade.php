@extends('layouts.layout')
@section('content')
    @if(session()->has('error'))
        <div class="bg-red-400 p-5 rounded-lg text-white">
            {{ session('error') }}
        </div>
    @endif
    <livewire:cart-detail></livewire:cart-detail>
@endsection
