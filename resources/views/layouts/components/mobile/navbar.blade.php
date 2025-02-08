<!-- Mobile Nav Button -->
<div class="flex sm:hidden items-center">
    <button id="mobileNavButton" class="flex-none focus:outline-none">
        <i class="fa-solid fa-bars h-fit"></i>
    </button>
</div>

<!-- Mobile Nav Menu -->
<div id="mobileNavMenu"
    class="fixed inset-0 bg-gray-100 z-50 hidden transition-transform duration-300 transform translate-y-full">
    <div class="flex flex-col h-full">
        <div class="flex justify-between border-b p-5 bg-white">
            <h1 class="font-semibold">Menu Utama</h1>
            <button id="closeMobileNavButton" class=" focus:outline-none">
                <i class="fa-solid fa-times h-fit"></i>
            </button>
        </div>
        <div class="px-5 py-3 grid grid-cols-2 gap-3 bg-white">
            <a href="{{ route('login') }}" class="btn-color-outline py-2 rounded-md text-sm">Masuk</a>
            <a href="" class="btn-color-fill py-2 rounded-md text-sm">Daftar</a>
        </div>
        <div class="mt-3 bg-white flex flex-col gap-3 p-5">
            <a href="#" class="flex gap-3 items-center">
                <div class="w-6 flex justify-center"><i class="text-xl fa-solid fa-cart-shopping"></i></div>Cart
            </a>
            <a href="#" class="flex gap-3 items-center">
                <div class="w-6 flex justify-center"><i class="text-xl fa-regular fa-bell"></i></div>Notifications
            </a>
        </div>
        <div class="mt-3 bg-white flex flex-col gap-3 p-5">
            <a href="{{route('art-list')}}" class="flex gap-3 items-center">
                Produk
            </a>
            <a href="https://wa.me/6282146415024" class="flex gap-3 items-center">
                Custom Karya
            </a>
            <a href="{{route('exhibition.index')}}" class="flex gap-3 items-center">
                Pameran
            </a>
            <a href="{{route('article.index')}}" class="flex gap-3 items-center">
                Artikel
            </a>
        </div>
    </div>
</div>

<script>
    document.getElementById('mobileNavButton').addEventListener('click', function() {
        var mobileNavMenu = document.getElementById('mobileNavMenu');
        if (mobileNavMenu.classList.contains('hidden')) {
            mobileNavMenu.classList.remove('hidden');
            setTimeout(function() {
                mobileNavMenu.classList.remove('translate-y-full');
            }, 10); // A small delay for smooth transition
        } else {
            mobileNavMenu.classList.add('translate-y-full');
            setTimeout(function() {
                mobileNavMenu.classList.add('hidden');
            }, 300); // Match the duration of the transition
        }
    });

    document.getElementById('closeMobileNavButton').addEventListener('click', function() {
        var mobileNavMenu = document.getElementById('mobileNavMenu');
        mobileNavMenu.classList.add('translate-y-full');
        setTimeout(function() {
            mobileNavMenu.classList.add('hidden');
        }, 300); // Match the duration of the transition
    });
</script>
