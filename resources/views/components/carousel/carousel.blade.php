<div class="header w-full max-h-32 md:max-h-72 lg:max-h-96 overflow-x-visible mb-5 relative group/btncont group/btn">
    <div class="swiper-container overflow-hidden lg:rounded-md">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="w-full object-cover object-center" src="{{ asset('images/banner/default.png') }}"
                    alt="">
            </div>
            <div class="swiper-slide">
                <img class="w-full object-cover object-center" src="{{ asset('images/banner/default.png') }}"
                    alt="">
            </div>
            <div class="swiper-slide">
                <img class="w-full object-cover object-center" src="{{ asset('images/banner/default.png') }}"
                    alt="">
            </div>
            <!-- Tambahkan lebih banyak gambar sesuai kebutuhan -->
        </div>
        <!-- Indikator Carousel -->
        <div class=" absolute left-3 flex w-full">
            <div class="swiper-pagination w-fit"></div>
        </div>
        <!-- Jika Anda ingin menambahkan navigasi prev/next -->
        <div class="opacity-0 group-hover/btncont:opacity-100 hidden md:block transition-all ease-in-out z-10">
            <div
                class="prev absolute left-2 group-hover/btn:-left-5 transition-all ease-in-out delay-75 top-1/2 transform -translate-y-1/2 border border-primary bg-white hover:bg-primary hover:text-white text-primary rounded-full w-10 h-10 flex items-center justify-center cursor-pointer z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </div>
            <div
                class="next absolute right-2 group-hover/btn:-right-5 transition-all ease-in-out delay-75 top-1/2 transform -translate-y-1/2 border border-primary bg-white hover:bg-primary hover:text-white text-primary rounded-full w-10 h-10 flex items-center justify-center cursor-pointer z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                    </path>
                </svg>
            </div>
        </div>
    </div>
</div>
<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplayDisableOnInteraction: false,
        slidesPerView: 1,
        autoHeight: true,
        autoplay: {
            delay: 5000,
        },
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

    // Update listArray based on the number of carousel items
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
                progressBar.style.backgroundColor = "white";
                progressBar.style.width = '100%';
                progressBar.style.transition = 'width 5s ease-in-out';
            } else {
                progressBar.style.backgroundColor = "transparent";
                progressBar.style.width = '0%';
            }
            // Mengurangi ukuran dot secara menyeluruh ketika progress mencapai 100%
            bullet.style.width = isActive ? '8px' : '8px'; // Ukuran default dot
            bullet.style.transition = 'width 0.5s ease-in-out'; // Transisi smooth
        });
    });
</script>
