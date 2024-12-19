<div class="flex flex-col mt-10 bg-gray-100 px-8 py-3">
    <div class="flex justify-between items-center">
        <img src="{{ asset('images/logo/artiknesia.svg') }}" alt="">
        <div class="flex gap-5">
            <a href="#" class="text-2xl text-primary-darker"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="text-2xl text-primary-darker"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" class="text-2xl text-primary-darker"><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>
    <div class="flex">
        <div class="w-3/5 flex flex-col md:grid md:grid-cols-3 gap-5 py-3">
            <p>Perum. Hill Park Regency Kav 2 Jl. Bandulan Barat 65146 Kota Malang Jawa Timur, Indonesia</p>
            {{-- <div class=""></div> --}}
            <div class="flex flex-col">
                <h1 class="text-xl font-semibold mb-3">Sitemap</h1>
                <ul class="flex flex-col gap-2">
                    <li>
                        <a href="https://seniman.artiknesia.com" class="text-sm underline">
                            Seniman
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('art-list') }}" class="text-sm underline">
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/6282146415024" class="text-sm underline">
                            Custom Karya
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('coming-soon') }}" class="text-sm underline">
                            Pameran
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('article.index') }}" class="text-sm underline">
                            Artikel
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-1/4">
            {{-- <p>aaaa</p> --}}
        </div>
    </div>
</div>
<div class="py-1 px-8 bg-gray-200 text-gray-600 text-sm">Made by ahmakbar</div>
