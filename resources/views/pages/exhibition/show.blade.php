@extends('layouts.layout2')

@section('content')
    <div class="container mx-auto py-2 md:py-10">
        <div class="grid grid-cols-12 gap-y-5 md:gap-x-10">
            <div class="col-span-12 md:col-span-9 flex flex-col gap-5">
                <img src="{{ \Illuminate\Support\Facades\Storage::url($exhibition->banner) }}"
                     alt="{{$exhibition->slug}}" class="w-full rounded-xl object-cover"/>
                <div class="flex flex-col gap-5">
                    <h1 class="text-xl font-semibold">Deskripsi</h1>
                    <p class="text-sm">{{ $exhibition->description }}</p>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="sticky top-32 p-8 flex flex-col justify-between gap-10 h-fit border border-gray-300 rounded-xl">
                    <h1
                        class="font-bold text-2xl">{{ $exhibition->name }}</h1>
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-solid fa-location-dot text-xl"></i>
                            <p class="text-sm">{{ $exhibition->address }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-regular fa-calendar-days text-xl"></i>
                            <p class="text-sm">{{$exhibition->formatted_date_range}}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <h1 class="text-xl font-bold">Harga Tiket</h1>
                        <div class="w-full h-fit rounded-lg grid grid-cols-2 justify-between items-center">
                            <p class="text-lg font-semibold">{{ $exhibition->formatted_price }}</p>
                            <a href="{{ $exhibition->link }}"
                               class="bg-primary text-center text-base text-white font-normal px-0 py-1 rounded-lg">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
