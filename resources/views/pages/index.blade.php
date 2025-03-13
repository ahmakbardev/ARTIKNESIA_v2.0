@extends('layouts.layout')

@section('content')
    @include('components.carousel.carousel')
    <div class="sale-produk pt-8 pb-3 px-2 md:px-5 lg:px-0 flex flex-col">
        <div class="flex justify-between">
            <h1 class="text-base lg:text-2xl font-semibold">New Release!</h1>
            <a href="{{ route('art-list') }}" class="underline">Lihat semua karya</a>
        </div>
        <div class="flex my-5 justify-end relative">
            <div
                class="w-56 h-72 bg-primary absolute left-0 z-0 rounded-2xl hidden lg:flex items-center justify-center pr-3">
                <h1 class="text-base lg:text-2xl font-semibold text-end">Lihat <br>
                    Produk <br>
                    yang lagi <br>
                    Hype yuk!</h1>
            </div>
            <div class="w-full lg:w-5/6 h-full lg:h-72 z-10 grid grid-cols-2 md:grid-cols-4 items-center gap-5">
                @foreach($art_recommendations as $item)
                    <a href="{{ route('art', $item->slug) }}"
                       class="bg-white border shadow-md h-full lg:h-5/6 rounded-xl flex flex-col overflow-hidden font-poppins group/profile">
                        <div class="relative w-full h-3/5 z-[0]">
                            <div
                                class="absolute text-white bottom-2 left-2 flex gap-2 items-end translate-y-16 transition-all ease-in-out group-hover/profile:translate-y-0">
                                <img class="size-10 object-cover rounded-full"
                                     src="{{ asset('images/profile/default.png') }}"
                                     alt="">
                                <p class="leading-none text-sm font-semibold">{{ $item->seniman->name }}</p>
                            </div>
                            <img class="w-full h-40 object-cover object-center"
                                 src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->images[0]) }}"
                                 alt="">
                        </div>
                        <div class="flex flex-col p-2 z-[1] bg-white">
                            <h1 class="text-sm md:text-lg font-semibold line-clamp-2">{{ $item->name }}</h1>
                            <h1 class="text-base md:text-xl font-bold leading-none">{{ \App\Helpers\Universal::idr($item->price) }}</h1>
                            <div class="flex gap-1 items-center">
                                <p class="text-xs md:text-sm text-slate-500 line-through">Rp. 1.000.000</p>
                                <p class="py-1 text-xs md:text-xs bg-primary text-white px-2 rounded-full">55%</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="custom-art  px-2 md:px-5 lg:px-0 py-20 max-lg:flex max-lg:flex-col lg:grid lg:grid-cols-2 gap-4">
        <div class="flex max-md:justify-center 2xl:justify-center gap-3 max-sm:h-64">
            <img class="max-sm:h-full object-contain" src="{{ asset('images/custom-karya/banner-1.png') }}" alt="">
            <img class="max-sm:h-full object-contain" src="{{ asset('images/custom-karya/banner-2.png') }}" alt="">
        </div>
        <div class="flex flex-col justify-center items-start">
            <h1 class="font-bold text-base md:text-lg text-primary">Mau custom art? bisa dong !</h1>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">Custom Art</h1>
            <p class="my-4 text-sm md:text-base">Custom Karya Merupakan fitur dimana Kamu bisa membuat karya untuk
                hadiah
                maupun
                kenang-kenangan. Project Akan
                di lakukan oleh para seniman Professional ARTIKNESIA.</p>
            <a href="https://wa.me/6282146415024" target="_blank"
               class="py-3 px-10 text-center btn-color-fill font-semibold rounded-md">Buat Sekarang</a>
        </div>
    </div>
    <div class="pameran px-2 md:px-5 lg:px-0">
        <div
            class="relative w-full flex items-center h-80 bg-gradient-to-r from-[#DFBE65] to-[#866200] rounded-md mb-5">
            <div class="flex flex-col p-5 w-full md:w-1/2 justify-center items-start">
                <h1 class="font-bold text-3xl md:text-5xl">Pameran Seni</h1>
                <p class="my-4 text-white text-sm">Pameran Seni ARTIKNESIA, menghadirkan pengalaman yang tak terlupakan
                    dalam
                    dua dimensi yang
                    berbeda: Pameran 3D Virtual dan Pameran Onsite. Ayo bergabung dalam perjalanan seni yang luar biasa
                    bersama
                    kami!</p>
                <div class="grid grid-cols-2 gap-3 w-full">
                    <a href="{{route('coming-soon')}}"
                       class="py-2 text-center btn-color-fill-white font-semibold text-sm md:text-base rounded-md text-black">
                        Pameran
                        Virtual
                    </a>
                    <a href="{{route('exhibition.index')}}"
                       class="py-2 text-center btn-color-fill-white font-semibold text-sm md:text-base rounded-md text-black">
                        Pameran
                        Onsite
                    </a>

                </div>
            </div>
            <img class="absolute right-10 bottom-0 hidden xl:flex" src="{{ asset('images/pameran/banner-1.png') }}"
                 alt="">
            <img class="absolute -right-20 bottom-0 hidden xl:flex" src="{{ asset('images/pameran/banner-2.png') }}"
                 alt="">
        </div>
    </div>
    <div class="artikel px-2 md:px-5 lg:px-0 flex flex-col my-10">
        <div class="flex justify-between items-end">
            <h1 class="text-2xl font-semibold">Artikel ARTIKNESIA</h1>
            <a href="{{ route('article.index') }}" class="underline">Lihat semua artikel</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5 my-5">
            @foreach ($articles as $item)
                <a href="{{ route('article.show', $item->slug) }}"
                    class="flex flex-col overflow-hidden rounded-xl border bg-white font-poppins shadow-md">
                    <img class="h-52 w-full object-cover object-center"
                        {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}" --}}
                        src="https://images.unsplash.com/flagged/photo-1572392640988-ba48d1a74457?q=80&w=1364&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="{{ $item->image_caption }}">
                    <div class="flex flex-1 flex-col justify-between gap-3 px-3 py-2 lg:p-4">
                        <h1 class="line-clamp-2 text-sm font-semibold leading-6 lg:text-lg">{{ $item->short_title }}</h1>
                        <div class="flex sm:flex-row gap-3 text-[0.65rem] items-center justify-between md:gap-6">
                            <div class="flex items-center gap-2 md:gap-2">
                                <img class="w-4 rounded-full object-contain md:w-5"
                                    src="{{ asset('images/profile/default.png') }}" alt="">
                                <div class="flex flex-col">
                                    <p class="truncate max-w-20 sm:max-w-none">
                                        Oleh <span class="font-semibold">{{ $item->author->name }}</span>
                                    </p>
                                    <p>
                                        {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-0.5 items-center text-neutral-500">
                                <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                                <p class="font-semibold self-end relative top-[0.035rem]">{{ \App\Helpers\Universal::formatViewCount($item->view_count) }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="contact px-2 md:px-5 lg:px-0">
        <div class="relative w-full flex items-center justify-center p-5 h-80 bg-primary rounded-md mb-5">
            <div class="w-4/6 flex flex-col items-center text-center gap-4">
                <h1 class="text-4xl lg:text-6xl font-semibold">Ingin Kolaborasi
                    dengan ARTIKNESIA?</h1>
                <a href="https://wa.me/6282146415024" target="_blank"
                   class="py-3 w-full text-center btn-color-fill-white font-semibold rounded-md text-black">Hubungi
                    Sekarang
                </a>
            </div>

        </div>
    </div>
@endsection
