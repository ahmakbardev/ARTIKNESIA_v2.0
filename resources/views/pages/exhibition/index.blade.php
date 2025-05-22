@extends('layouts.layout2')

@section('content')
    @foreach ($exhibitions as $exhibition)
        <div class="min-h-[300px] md:min-h-[450px] w-full relative exhibition-banner flex items-center"
            style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($exhibition->banner) }}')">
            <div class="container py-10 mx-auto h-fit hidden md:block">
                <div class="bg-white w-1/2 lg:w-5/12 2xl:w-1/4 h-full rounded-lg py-6 px-8 flex flex-col gap-10">
                    <h1 class="text-3xl font-bold">{{ $exhibition->name }}</h1>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-solid fa-location-dot text-2xl"></i>
                            <p class="text-base">{{ $exhibition->address }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-regular fa-calendar-days text-2xl"></i>
                            <p class="text-base">{{ $exhibition->formatted_date_range }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-regular fa-calendar-days text-2xl"></i>
                            <p class="text-base">{{ $exhibition->status }}</p>
                        </div>
                    </div>
                    <div class="bg-primary w-full h-fit py-4 px-3 rounded-lg grid grid-cols-2 justify-between items-center">
                        <p class="text-lg font-semibold">{{ $exhibition->formatted_price }}</p>
                        <a href="{{ route('exhibition.show', $exhibition->slug) }}"
                            class="bg-white text-base text-center text-primary font-normal px-3 py-1 rounded-lg">
                            {{ $exhibition->status != 'completed' ? 'Beli Sekarang' : 'Tutup' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5 mx-auto h-fit block md:hidden">
            <div class="bg-white w-full h-full rounded-lg p-3 flex flex-col gap-10 border border-gray-300">
                <h1 class="text-3xl font-bold">{{ $exhibition->name }}</h1>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-solid fa-location-dot text-2xl"></i>
                        <p class="text-base">{{ $exhibition->address }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-regular fa-calendar-days text-2xl"></i>
                        <p class="text-base">{{ $exhibition->formatted_date_range }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-regular fa-calendar-days text-2xl"></i>
                        <p class="text-base">{{ $exhibition->status }}</p>
                    </div>
                </div>
                <div class="bg-primary w-full h-fit py-4 px-3 rounded-lg grid grid-cols-2 justify-between items-center">
                    <p class="text-lg font-semibold">{{ $exhibition->formatted_price }}</p>
                    <a href="{{ route('exhibition.show', $exhibition->slug) }}"
                        class="bg-white text-lg text-center text-primary font-normal px-3 py-1 rounded-lg">Beli
                        Sekarang
                    </a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container mt-2 md:mt-20 grid grid-cols-12 gap-y-10 md:gap-x-10 2xl:gap-20">
        <div class="col-span-12 lg:col-span-8 ">
            <livewire:exhibition-list />
        </div>
        <div class="col-span-12 lg:col-span-4">
            <div
                class="md:sticky md:top-40 bg-primary rounded-lg text-white p-5 2xl:p-10 text-center flex flex-col gap-3 items-center">
                <h1 class="text-2xl 2xl:text-3xl font-semibold">Mau menjadi Mitra ARTIKNESIA?</h1>
                <img src="{{ asset('images/logo/logo-white.png') }}" alt="Artiknesia.com"
                    class="size-32 2xl:size-44 object-contain" />
                <h1 class="text-2xl 2xl:text-3xl font-semibold">Segera hubungi ARTIKNESIA
                    disini!</h1>
                <a href="https://wa.me/6282146415024" target="_blank"
                    class="bg-white text-primary w-full py-2 2xl:py-4 text-xl 2xl:text-2xl rounded-full font-semibold">
                    Hubungi Sekarang!
                </a>
            </div>
        </div>
    </div>
@endsection
