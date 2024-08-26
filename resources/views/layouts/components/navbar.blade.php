<header class="shadow-sm border-b sticky top-0 z-50">
    <nav class="nav-info py-2 bg-owngray justify-end px-5 hidden md:flex">
        <ul class="flex gap-6 text-xs text-navInfoGray">
            <li>Tentang Artiknesia</li>
            <li>Seniman</li>
            <li>Blog</li>
            <li>Promo</li>
        </ul>
    </nav>
    <nav class="px-5 py-2 flex gap-10 justify-between items-center sm:items-start bg-white">
        <img class="flex-none" src="{{ asset('images/logo/artiknesia.svg') }}" alt="">
        <div class="hidden sm:flex flex-col flex-1">
            <div class="relative">
                <label for="search" class="absolute top-1/2 -translate-y-1/2 left-4">
                    <img src="{{ asset('images/icons/search.svg') }}" alt="">
                </label>
                <input type="text" name="search"
                       class="border px-10 rounded-md py-2 w-full bg-gray-50 focus:outline-primary/50 text-sm"
                       placeholder="Cari di Artiknesia">
            </div>
            <div class="mt-3">
                <ul class="flex gap-5">
                    <li class="text-gray-400 text-xs">Product</li>
                    <li class="text-gray-400 text-xs">Custom Karya</li>
                    <li class="text-gray-400 text-xs">Pameran</li>
                    <li class="text-gray-400 text-xs">Artikel</li>
                </ul>
            </div>
        </div>
        <div class="hidden sm:flex">
            <livewire:cart></livewire:cart>
            <div class="flex w-px bg-owngray"></div>
            @auth
                <ul class="flex items-center gap-3 ml-3 flex-none">
                    <li>
                        <a href="{{ route('transaction') }}" class="btn-color-outline py-1 px-3 rounded-md text-sm">Transaksi</a>
                    </li>
                </ul>
            @else
                <ul class="flex items-center gap-3 ml-3 flex-none">
                    <li>
                        <button class="btn-color-outline py-1 px-3 rounded-md text-sm">Masuk</button>
                    </li>
                    <li>
                        <button class="btn-color-fill py-1 px-3 rounded-md text-sm">Daftar</button>
                    </li>
                </ul>
            @endauth
        </div>
        @include('layouts.components.mobile.navbar')
    </nav>
    <nav class="search-mobile block sm:hidden p-3 bg-white">
        <div class="relative">
            <label for="search" class="absolute top-1/2 -translate-y-1/2 left-4">
                <img src="{{ asset('images/icons/search.svg') }}" alt="">
            </label>
            <input type="text" name="search"
                   class="border px-10 rounded-md py-2 w-full bg-gray-50 focus:outline-primary/50 text-sm"
                   placeholder="Cari di Artiknesia">
        </div>
    </nav>
</header>
