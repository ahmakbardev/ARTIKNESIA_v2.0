@extends('layouts.layout2')

@section('content')
    <div class="mb-24">
        {{-- HERO --}}
        <div class="relative mx-auto mb-20 flex max-w-[1440px] flex-col-reverse justify-end gap-7 lg:gap-0 lg:h-[542px] lg:flex-row">
            <div class="static bottom-0 left-10 top-0 z-10 items-center lg:absolute lg:flex">
                <div class="relative flex flex-col items-center justify-center px-7 py-5 text-white shadow-[6px_6px_4px_rgba(0,0,0,0.25)]">
                    <img src="{{ asset('images/pameran/background-cta.png') }}" class="pointer-events-none absolute left-0 top-0 -z-10 h-full w-full object-cover" />
                    <h2 class="text-center font-poppins text-2xl font-semibold drop-shadow-[0_4px_2px_rgba(0,0,0,0.25)]">Mau Menjadi Mitra <br> Artiknesia?</h2>
                    <img src="{{ asset('images/logo/logo-white-2.png') }}" class="w-44" alt="">
                    <p class="text-center font-poppins text-lg font-semibold drop-shadow-[0_4px_2px_rgba(0,0,0,0.25)]">Segera hubungi dengan Klik tombol <br> di bawah ini</p>
                    <a href="https://wa.me/6282146415024" target="_blank"
                       class="mt-3 rounded-md bg-white p-3 font-poppins text-lg font-semibold text-black">
                        Hubungi Sekarang!
                    </a>
                </div>
            </div>
            <div class="h-full w-full max-w-[1280px] shadow-[0_6px_4px_rgba(0,0,0,0.25)] lg:w-[75%]">
                @include('components.carousel.pameran-carousel')
            </div>
        </div>
        {{-- LIST PAMERAN --}}
        <div class="mx-auto max-w-[1160px] px-5 md:px-10 2xl:px-2">
            <livewire:exhibition-list />
        </div>
    </div>
@endsection
