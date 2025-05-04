@php
    $posters = ['1', '2', '3'];
@endphp

<div class="header group/btncont group/btn relative overflow-x-visible h-[400px]">
    <div class="swiper-container overflow-hidden rounded-xl">
        {{-- wrapper(isi carousel) --}}
        <div class="swiper-wrapper">
            @foreach ($images_exhibition as $item)
                <div class="swiper-slide">
                    <div class="absolute top-2 right-2 z-10 rounded-full bg-white p-2 cursor-pointer zoom-btn" onclick="openZoom('{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image_path) }}')">
                        <img src="{{ asset('images/icons/zoom-picture.svg') }}" class="size-4" alt="">
                    </div>
                    <div class="relative">
                        <img class="w-full h-[400px] object-cover object-center"
                             src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image_path) }}"
                             alt="{{ $item->image_path }}">
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Indikator Carousel -->
        <div class="article-swiper-pagination absolute left-[30%] top-[calc(100%+3rem)] xs:left-[35%] sm:left-[40%] w-3/4">
            <div class="swiper-pagination w-fit"></div>
        </div>
    </div>
</div>

<!-- Modal Zoom -->
<div id="zoomModal" class="fixed inset-0 z-[110] hidden flex bg-black/80 items-center justify-center">
    <img id="zoomedImage" src="" class="transform scale-75 max-w-full max-h-full rounded-lg" alt="img">
    <button onclick="closeZoom()" class="absolute right-5 top-5 text-white bg-red-500 rounded-full flex items-center justify-center w-8 h-8"><i class="fa-solid fa-xmark"></i></button>
</div>

<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplayDisableOnInteraction: false,
        slidesPerView: 1,
        autoHeight: true,
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            type: 'bullets',
            renderBullet: function(index, className) {
                return '<span class="' + className + '">' +
                    '<i></i>' + '<b></b>' + '</span>';
            },
        },
        navigation: {
            nextEl: '.next',
            prevEl: '.prev',
        },
    });

    var listArray = [];
    var carouselItems = document.querySelectorAll('.swiper-slide');
    carouselItems.forEach(function(item, index) {
        listArray.push("slide" + (index + 1));
    });

    mySwiper.on('slideChange', function() {
        var bullets = document.querySelectorAll('.swiper-pagination-bullet');
        bullets.forEach(function(bullet, index) {
            var isActive = index === mySwiper.realIndex;
            var progressBar = bullet.querySelector('b');
            if (isActive) {
                progressBar.style.transition = 'none';
                progressBar.style.backgroundColor = "grey";
                progressBar.style.width = '100%';
            } else {
                progressBar.style.transition = 'none';
                progressBar.style.backgroundColor = "transparent";
                progressBar.style.width = '0%';
            }
            // Mengurangi ukuran dot secara menyeluruh ketika progress mencapai 100%
        });
    });


    function openZoom(src) {
        const modal = document.getElementById('zoomModal');
        const zoomedImg = document.getElementById('zoomedImage');
        zoomedImg.src = src;
        modal.classList.remove('hidden');
    }

    // Fungsi tutup modal zoom
    function closeZoom() {
        document.getElementById('zoomModal').classList.add('hidden');
    }

    // Zoom button event listeners
    // document.addEventListener('DOMContentLoaded', () => {
    //     document.querySelectorAll('.zoom-btn').forEach(function(btn) {
    //         btn.addEventListener('click', function() {
    //             const slide = btn.closest('.swiper-slide');
    //             const img = slide.querySelector('img');
    //             const src = img.getAttribute('src');
    //             openZoom(src);
    //         });
    //     });
    // });
</script>
