@extends('layouts.layout2')

@section('content')
    <section class="h-[50vh] lg:h-[80vh] relative overflow-hidden">
        <div class="h-full w-full z-[3] absolute top-0">
            <div class="container mx-auto h-full w-full">
                <div class="flex flex-col items-center lg:items-start justify-center h-full gap-y-3 lg:gap-y-8">
                    <h1 class="text-white text-2xl lg:text-7xl font-bold drop-shadow-xl text-center lg:text-start">Ekspresikan <br/> Kreatifitasmu Bersama
                        <br/>ARTIKNESIA</h1>
                    <a href="https://seniman.artiknesia.com"
                       class="bg-primary text-white rounded-full border-2 border-white text-base lg:text-3xl px-5 lg:px-10 py-1 lg:py-3 font-bold">
                        Gabung
                        Mitra
                        Seniman
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-black w-full h-full absolute top-0 opacity-50 z-[2]"></div>
        <video autoplay muted loop id="myVideo" class="absolute top-0 z-1 h-[80vh] lg:h-[120vh] object-cover">
            <source src="{{ asset('images/about/FIxed.mp4') }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </section>
    <section class="container mx-auto py-10">
        <div class="flex flex-col gap-y-3 lg:gap-y-6 items-center">
            <h1 class="text-center text-3xl lg:text-7xl font-bold">Tantangan Kami</h1>
            <div class="bg-primary rounded-2xl p-5 flex flex-col items-center gap-y-2 lg:gap-y-5">
                <h2 class="text-lg lg:text-3xl text-center text-white font-bold">Digitalisasi Industri Seni Yang Kurang Optimal Di
                    Indonesia</h2>
                <p class="text-black leading-relaxed text-sm lg:text-2xl text-center">Indonesia sebagai negara yang memiliki banyak
                    seniman sulit dalam melakukan exposure karya secara digital
                    sehingga sulit untuk mendapat apresiasi dari masyarakat yang lebih luas. Kemudian, masyarakat yang
                    memiliki keterbatasan akses terhadap seni tidak dapat memberikan apresiasi seni kepada para seniman
                    lokal</p>
            </div>
            <img src="{{ asset('images/about/indonesia.png') }}" alt="Artiknesia Indonesia"
                 class="object-contain w-full lg:w-1/2"/>
        </div>
    </section>
    <section class="container mx-auto my-2 lg:my-10">
        <div class="lg:grid grid-cols-2 gap-y-5">
            <div class="flex flex-col gap-y-5">
                <div class="flex flex-col gap-y-2 lg:gap-y-5 text-center">
                    <h1 class="text-2xl lg:text-5xl font-bold">Visi</h1>
                    <blockquote>
                        <p class="text-sm lg:text-2xl italic font-medium text-black">“Menjadi Jembatan Seniman dan Masyarakat Dalam
                            Pengembangan Industri Seni Di Indonesia”</p>
                    </blockquote>
                </div>
                <div class="flex flex-col gap-y-2 lg:gap-y-5 items-center">
                    <h1 class="text-2xl lg:text-5xl font-bold text-center">Misi</h1>
                    <ul class="list-disc font-normal text-sm lg:text-xl space-y-1 w-full lg:w-4/5 px-3 lg:px-0">
                        <li>Memberdayakan Seniman Indonesia Melalui Penyediaan Platform Digital berupa e-commerce untuk
                            penjualan karya
                        </li>
                        <li>Menciptakan Komunitas Seni yang menjunjung tinggi kreatifitas dan keberagaman
                        </li>
                        <li> Memberikan ruang edukasi dan inspirasi kepada masyarakat sehingga dapat meningkatkan
                            apresiasi
                            seniman lokal
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden lg:block w-full h-full relative">
                <div class="absolute lg:top-20 xl:top-0 left-10 w-1/2 ">
                    <img src="{{ asset('images/about/visi-misi-1.webp') }}" alt="Visi Misi Artiknesia"
                         class="w-full rounded-xl drop-shadow-lg"/>
                </div>
                <div class="absolute lg:bottom-20 xl:bottom-0 right-10 w-1/2 ">
                    <img src="{{ asset('images/about/visi-misi-2.webp') }}" alt="Visi Misi Artiknesia"
                         class="w-full rounded-xl drop-shadow-lg"/>
                </div>
            </div>
        </div>
    </section>
    <section class="scroller overflow-hidden my-10 lg:my-20">
        <div class="scroller-inner flex gap-12 flex-nowrap *:shrink-0">
            <div class="h-20 w-32 item item-1"></div>
            <div class="h-20 w-32 item item-2"></div>
            <div class="h-20 w-32 item item-3"></div>
            <div class="h-20 w-32 item item-4"></div>
            <div class="h-20 w-32 item item-5"></div>
            <div class="h-20 w-32 item item-1"></div>
            <div class="h-20 w-32 item item-2"></div>
            <div class="h-20 w-32 item item-3"></div>
            <div class="h-20 w-32 item item-4"></div>
            <div class="h-20 w-32 item item-5"></div>
            <div class="h-20 w-32 item item-1"></div>
            <div class="h-20 w-32 item item-2"></div>
            <div class="h-20 w-32 item item-3"></div>
            <div class="h-20 w-32 item item-4"></div>
            <div class="h-20 w-32 item item-5"></div>
            <div class="h-20 w-32 item item-1"></div>
            <div class="h-20 w-32 item item-2"></div>
            <div class="h-20 w-32 item item-3"></div>
            <div class="h-20 w-32 item item-4"></div>
            <div class="h-20 w-32 item item-5"></div>
        </div>
    </section>
    <section class="my-2 lg:my-10">
        <div class="bg-primary py-2 lg:py-10">
            <div class="container mx-auto text-white text-center flex flex-col items-center">
                <h1 class="font-bold text-2xl lg:text-7xl drop-shadow-md uppercase">Bisnis Kami</h1>
                <p class="text-sm lg:text-3xl leading-tight drop-shadow-lg w-2/3">Kami Memiliki bidang bisnis yang dapat membantu
                    seniman dan juga masyarakat dalam mengeksplorasi
                    seni</p>
            </div>
        </div>
        <div class="container mx-auto py-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-5 gap-x-10 text-center">
                <div class="flex flex-col gap-y-1 lg:gap-y-5 items-center justify-center">
                    <img src="{{ asset('images/about/ecommerce.png') }}" alt="Artiknesia E-commerce"
                         class="object-contain w-1/2"/>
                    <h2 class="text-xl lg:text-3xl font-bold">E-commerce</h2>
                    <p class="text-sm lg:text-lg">Platform Kami menyediakan E-commerce yang bertujuan untuk seniman lokal menjual karyanya secara
                        digital.</p>
                </div>
                <div class="flex flex-col gap-y-1 lg:gap-y-5 items-center justify-center">
                    <img src="{{ asset('images/about/custom-art.png') }}" alt="Artiknesia E-commerce"
                         class="object-contain w-1/2"/>
                    <h2 class="text-xl lg:text-3xl font-bold">Custom Artwork</h2>
                    <p class="text-sm lg:text-lg">Custom Artwork yang dapat membantu seniman mendapat proyek-proyek seni baik dari kalangan
                        masyarakat
                        dan organisasi</p>
                </div>
                <div class="flex flex-col gap-y-1 lg:gap-y-5 items-center justify-center">
                    <img src="{{ asset('images/about/pameran.png') }}" alt="Artiknesia E-commerce"
                         class="object-contain w-1/2"/>
                    <h2 class="text-xl lg:text-3xl font-bold">Events & Activities</h2>
                    <p class="text-sm lg:text-lg">Selain sebagai platform penjualan, ARTIKNESIA juga menjadi wadah bagi seniman dan masyarakat
                        dalam
                        belajar,memahami, serta berdiskusi terkait perkembangan seni.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
