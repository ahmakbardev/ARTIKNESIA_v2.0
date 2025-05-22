@extends('layouts.layout-v2')

@section('content')
    @include('components.carousel.carousel')
    <div class="relative sale-produk mt-8 pt-8 pb-3 px-2 flex flex-col xs:mt-[5.75rem] sm:mt-[8.5rem] md:mt-16 md:px-5 lg:px-0 xl:mt-28 2xl:pt-10 2xl:mt-32">
        <div class="pointer-events-none absolute top-0 left-0 right-0 z-10 lg:hidden">
            <img class="w-full" src="{{ asset('images/art-recommendation/bg-mobile.svg') }}" alt="">
        </div>
        
        <div class="pointer-events-none hidden absolute w-full bg-cover bg-top z-10 top-0 rounded-lg lg:block">
            <img class="w-full" src="{{ asset('images/art-recommendation/bg-desktop.svg') }}" alt="">
        </div>

        <div class="z-[15] flex justify-center mt-16 md:mt-28 lg:justify-end lg:mt-3 lg:mr-24 xl:mt-8 xl:mr-28 2xl:mr-32">
            <h1 class="text-xl text-[#344054] font-bold md:text-2xl xl:text-3xl">Lihat Produk yang Lagi <span class="ml-1 bg-red-400 rounded-lg px-1.5 py-0.5 hype-art-recommendation text-white">Hype</span></h1>
        </div>
        <div class="flex mt-8 mb-1 justify-center relative lg:mb-6 lg:px-0">
            <div class="px-4 pb-10 w-full h-full overflow-x-auto flex items-stretch m gap-5 lg:grid lg:grid-cols-4 lg:w-5/6 lg:pb-0 lg:overflow-x-visible lg:px-0">
                @foreach($art_recommendations as $item)
                    <a href="{{ route('art', $item->slug) }}"
                       class="w-64 shrink-0 bg-white border shadow-[4px_4px_4px_rgba(0,0,0,0.1)] rounded-xl flex flex-col overflow-hidden font-poppins group/profile lg:w-auto">
                        <div class="relative w-full h-3/5 z-[0]">
                            <div class="absolute right-3 top-3 text-white bg-[#F79009] flex items-center px-2 py-1 text-xs rounded-lg">
                                Populer <img src="{{ asset('images/icons/favorite.svg') }}" class="size-4 ml-0.5" alt="">
                            </div>
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
                        <div class="flex flex-col p-2 z-[1] bg-white flex-1 justify-between">
                            <h1 class="text-sm font-bold line-clamp-2 mb-3">{{ $item->name }}</h1>
                            <div>
                                <h1 class="text-lg font-bold leading-none mb-1">{{ \App\Helpers\Universal::idr($item->price) }}</h1>
                                <div class="flex gap-3 items-center">
                                    <p class="text-xs md:text-sm text-slate-500 line-through">Rp 1.000.000</p>
                                    <p class="py-1 text-xs md:text-xs bg-primary text-white px-2 rounded-xl">55%</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="hidden absolute right-6 top-0 bottom-0 items-center lg:flex xl:right-8 2xl:right-10">
                    <a href="{{ route('art-list') }}">
                        <div class="rounded-full bg-white shadow-[4px_4px_4px_rgba(0,0,0,0.1)] p-3 cursor-pointer">
                            <img src="{{ asset('images/icons/arrow-right-art-recommend.svg') }}" class="size-5" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-2 px-3 text-right flex items-center justify-end gap-2 lg:hidden">
            <div class="">Lihat semua karya</div> 
            <a href="{{ route('art-list') }}">
                <div class="rounded-full bg-white shadow-[4px_4px_4px_rgba(0,0,0,0.1)] p-3 cursor-pointer">
                    <img src="{{ asset('images/icons/arrow-right-art-recommend.svg') }}" class="size-5" alt="">
                </div>
            </a>
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
        <div class="relative w-full flex items-center h-80 bg-gradient-to-r from-[#DFBE65] to-[#866200] rounded-md mb-5">
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
                        src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
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
