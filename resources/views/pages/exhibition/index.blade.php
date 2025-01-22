@extends('layouts.layout2')

@section('content')
    <div class="h-[450px] w-full relative exhibition-banner"
         style="background-image: url('{{asset('images/pameran-banner.jpg')}}')">
        <div class="container py-10 mx-auto h-full">
            <div class="bg-white w-1/4 h-full rounded-lg py-6 px-8 flex flex-col justify-between">
                <h1 class="text-3xl font-bold">Pameran Trip Seni Malang</h1>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-solid fa-location-dot text-2xl"></i>
                        <p class="text-base">Galeri Roas Kota Batu</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-regular fa-calendar-days text-2xl"></i>
                        <p class="text-base">17 Februari 2025 - 20 Februari 2025</p>
                    </div>
                </div>
                <div class="bg-primary w-full h-fit py-4 px-3 rounded-lg grid grid-cols-2 justify-between items-center">
                    <p class="text-lg font-normal">IDR 100.000</p>
                    <button type="button" class="bg-white text-lg text-primary font-normal px-3 py-1 rounded-lg">Beli
                        Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-20 grid grid-cols-12 gap-20">
        <div class="col-span-8">
            <livewire:exhibition-list/>
        </div>
        <div class="col-span-4">
            <div
                class="sticky top-40 bg-primary rounded-lg text-white p-10 text-center flex flex-col gap-3 items-center">
                <h1 class="text-3xl font-semibold">Mau menjadi Mitra ARTIKNESIA?</h1>
                <img src="{{asset('images/logo/logo-white.png')}}" alt="Artiknesia.com" class="size-44 object-contain"/>
                <h1 class="text-3xl font-semibold">Segera hubungi ARTIKNESIA disini!</h1>
                <button type="button" class="bg-white text-primary w-full py-4 text-2xl rounded-full font-semibold">
                    Hubungi Sekarang!
                </button>
            </div>
        </div>

    </div>
@endsection
