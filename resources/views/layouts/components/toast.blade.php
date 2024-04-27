<div id="customModal"
    class="fixed inset-0 z-50 flex items-center justify-center overflow-y-hidden bg-black bg-opacity-50 transition-opacity duration-300 hidden opacity-0">
    <div
        class="modal-content bg-white rounded-lg w-5/6 h-5/6 p-8 transform translate-y-16 opacity-0 transition-transform duration-300 ease-in-out">
        <!-- Konten modal -->
        <div
            class="custom-art relative px-2 md:px-5 lg:px-0 max-lg:flex max-lg:flex-col lg:grid lg:grid-cols-2 h-full gap-4">
            <div class="flex max-md:justify-center 2xl:justify-center gap-3 max-sm:h-64">
                <img class="object-contain" src="{{ asset('images/custom-karya/banner-1.png') }}" alt="">
                <img class="object-contain" src="{{ asset('images/custom-karya/banner-2.png') }}" alt="">
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
                <!-- Tombol close -->
                <button id="closeModalBtn"
                    class="absolute top-0 right-0 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('customModal').classList.remove('hidden');
        setTimeout(function() {
            document.getElementById('customModal').classList.add('opacity-100');
            document.getElementById('customModal').querySelector('.modal-content').classList.add(
                'translate-y-0', 'opacity-100');
            document.getElementById('customModal').querySelector('.modal-content').style.transform =
                'translateY(0)';
        }, 50); // Tunggu 0.5 detik sebelum muncul secara smooth
    }, 3000);

    // Tambahkan event listener untuk tombol close
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('customModal').classList.remove('opacity-100');
        document.getElementById('customModal').querySelector('.modal-content').classList.remove('translate-y-0',
            'opacity-100');
        setTimeout(function() {
            document.getElementById('customModal').querySelector('.modal-content').classList.add(
                'translate-y-16', 'opacity-0');
            setTimeout(function() {
                document.getElementById('customModal').querySelector('.modal-content').style
                    .transform =
                    'translateY(16px)';
                document.getElementById('customModal').classList.add('hidden');
            }, 30); // Sesuaikan dengan durasi transition (0.3s)
        }, 50); // Tunggu 0.5 detik sebelum modal ditutup secara smooth
    });
</script>
