@extends('layouts.layout')

@section('content')
    @include('components.carousel.carousel')
    <div class="kategori px-2 md:px-5 lg:px-0 hidden md:flex flex-col">
        <h1 class="text-base lg:text-2xl font-semibold">Kategori Produk</h1>
        <div class="flex gap-5 my-5">
            @foreach($arts as $item)
                <div class="w-64 h-36 border shadow-sm rounded-md flex justify-around items-center p-4">
                    <img src="{{ asset('/images/kategori/fine-art.png') }}" alt=""
                         class="hidden md:flex object-contain h-full rounded-md">
                    <h1 class="text-xl font-bold">Fine Art</h1>
                </div>
            @endforeach
        </div>
    </div>
    <div class="sale-produk px-2 md:px-5 lg:px-0 flex flex-col">
        <h1 class="text-base lg:text-2xl font-semibold">Art yang lagi hype abis nih!</h1>
        <div class="flex my-5 justify-end relative">
            <div
                class="w-56 h-72 bg-primary absolute left-0 z-0 rounded-2xl hidden lg:flex items-center justify-center pr-3">
                <h1 class="text-base lg:text-2xl font-semibold text-end">Lihat <br>
                    Produk <br>
                    yang lagi <br>
                    Hype yuk!</h1>
            </div>
            <div class="w-full lg:w-5/6 h-full lg:h-72 z-10 grid grid-cols-2 md:grid-cols-4 items-center gap-5">
                @for ($i = 0; $i < 4; $i++)
                    <a href="#"
                       class="bg-white border shadow-md h-full lg:h-5/6 rounded-xl flex flex-col overflow-hidden font-poppins  group/profile">
                        <div class="relative w-full h-3/5 z-[0]">
                            <div
                                class="absolute text-white bottom-2 left-2 flex gap-2 items-end translate-y-16 transition-all ease-in-out group-hover/profile:translate-y-0">
                                <img class="w-10 object-contain" src="{{ asset('images/profile/default.png') }}"
                                     alt="">
                                <p class="leading-none text-sm font-semibold">akbar</p>
                            </div>
                            <img class="w-full h-full object-cover object-center"
                                 src="{{ asset('images/produk/default.png') }}" alt="">
                        </div>
                        <div class="flex flex-col p-2 z-[1] bg-white">
                            <h1 class="text-sm md:text-lg font-semibold">Produk 1</h1>
                            <h1 class="text-base md:text-xl font-bold leading-none">Rp. 300.000</h1>
                            <div class="flex gap-1 items-center">
                                <p class="text-xs md:text-sm text-slate-500 line-through">Rp. 1.000.000</p>
                                <p class="py-1 text-xs md:text-xs bg-primary text-white px-2 rounded-full">55%</p>
                            </div>
                        </div>
                    </a>
                @endfor
            </div>
        </div>
    </div>
    <div class="produk-artiknesia px-2 md:px-5 lg:px-0 flex flex-col">
        <h1 class="text-base lg:text-2xl font-semibold">ARTIKNESIA Art</h1>
        <div class="grid grid-cols-2 gap-5 py-5 bg-white sticky top-28 z-10">
            <button
                class="py-3 text-center btn-color-fill font-semibold rounded-md hover:btn-color-outline hover:btn-color-fill-white transition-all ease-in-out">
                Fine
                Art
            </button>
            <button
                class="py-3 text-center btn-color-outline font-semibold rounded-md hover:btn-color-fill transition-all ease-in-out">
                Digital
                Art
            </button>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 my-5 z-[2]">
            @for ($i = 0; $i < 10; $i++)
                <div
                    class="produk bg-white border shadow-md md:h-80 rounded-xl flex flex-col overflow-hidden group/belimobile group/profile font-poppins">
                    <div class="relative w-full h-3/5 z-[0]">
                        <a href="#"
                           class="absolute text-white bottom-2 left-2 hidden md:flex gap-2 items-end translate-y-16 transition-all ease-in-out group-hover/profile:translate-y-0">
                            <img class="w-10 object-contain" src="{{ asset('images/profile/default.png') }}" alt="">
                            <p class="leading-none text-sm font-semibold">akbar</p>
                        </a>
                        <img class="w-full object-cover object-center" src="{{ asset('images/produk/default.png') }}"
                             alt="">
                    </div>
                    <div class="flex flex-col justify-between bg-white z-[1] group/beli">
                        <div class="flex flex-col p-2">
                            <div class="flex justify-between">
                                <h1 class="text-base md:text-lg font-semibold cursor-default">Produk 1</h1>
                                <button id="wishlistButton">
                                    <i class="fa-regular fa-heart text-red-500"></i>
                                    {{-- <i class="fa-solid fa-heart text-red-500"></i> --}}
                                </button>
                            </div>
                            <h1 class="text-sm md:text-xl font-bold leading-none cursor-default">Rp. 300.000</h1>
                            <div class="flex gap-1 items-center">
                                <p class="text-xs md:text-sm text-slate-500 line-through cursor-default">Rp.
                                    1.000.000</p>
                                <p class="py-1 text-xs bg-primary text-white px-2 rounded-full cursor-default">55%</p>
                            </div>
                        </div>
                        <div class="flex flex-col relative -mt-1">
                            <p class="p-2 text-xs md:text-base cursor-default">1 stok</p>
                            <button
                                class="absolute py-1 w-4/6 bottom-2 right-1 translate-y-16 transition-all hidden md:inline ease-in-out group-hover/beli:translate-y-0 text-center btn-color-fill font-normal text-sm rounded-md">
                                Beli
                                <span class="hidden md:inline-flex">Sekarang</span></button>
                            <button
                                class="absolute py-1 w-4/6 bottom-2 right-1 translate-y-16 transition-all inline md:hidden ease-in-out group-hover/belimobile:translate-y-0 text-center btn-color-fill font-normal text-xs md:text-sm rounded-md">
                                Beli
                                <span class="hidden md:inline-flex">Sekarang</span></button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <button class="py-2 text-center btn-color-fill font-semibold rounded-md">Lihat semua karya</button>
    </div>
    <div class="custom-art px-2 md:px-5 lg:px-0 py-20 max-lg:flex max-lg:flex-col lg:grid lg:grid-cols-2 gap-4">
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
            <button class="py-3 px-10 text-center btn-color-fill font-semibold rounded-md">Buat Sekarang</button>
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
                    <button
                        class="py-2 text-center btn-color-fill-white font-semibold text-sm md:text-base rounded-md text-black">
                        Pameran
                        Virtual
                    </button>
                    <button
                        class="py-2 text-center btn-color-fill-white font-semibold text-sm md:text-base rounded-md text-black">
                        Pameran
                        Onsite
                    </button>

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
            <a href="#" class="underline">Lihat semua artikel</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-5 my-5">
            @for ($i = 0; $i < 4; $i++)
                <div
                    class="bg-white border shadow-md h-fit md:h-5/6 rounded-xl flex flex-col overflow-hidden font-poppins">
                    <img class="w-full md:h-3/5 object-cover object-center"
                         src="{{ asset('images/produk/default.png') }}" alt="">
                    <div class="flex flex-col p-2 justify-between h-2/5md:">
                        <h1 class="text-sm lg:text-lg line-clamp-2 font-semibold leading-6">Karikatur sebagai media
                            satire
                            politik dan sosial</h1>
                        <div class="flex gap-2 md:gap-4 items-center">
                            <img class="w-8 md:w-12 rounded-full object-contain"
                                 src="{{ asset('images/profile/default.png') }}" alt="">
                            <div class="flex flex-col max-md:mt-3">
                                <p class="text-xs md:text-sm font-semibold truncate">Ahmad Akbar</p>
                                <p class="text-xs">24 Jan 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="contact px-2 md:px-5 lg:px-0">
        <div class="relative w-full flex items-center justify-center p-5 h-80 bg-primary rounded-md mb-5">
            <div class="w-4/6 flex flex-col items-center text-center gap-4">
                <h1 class="text-4xl lg:text-6xl font-semibold">Ingin Kolaborasi
                    dengan ARTIKNESIA?</h1>
                <button class="py-3 w-full text-center btn-color-fill-white font-semibold rounded-md text-black">Hubungi
                    Sekarang
                </button>
            </div>

        </div>
    </div>
@endsection
