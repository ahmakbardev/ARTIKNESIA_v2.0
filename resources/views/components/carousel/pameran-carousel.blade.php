@php
    $posters = ['1', '2', '3'];
@endphp

<div class="header group/btncont group/btn relative overflow-x-visible">
    <div class="swiper-container h-[542px] w-full overflow-hidden">
        {{-- wrapper(isi carousel) --}}
        <div class="swiper-wrapper">
            @foreach ($exhibitions as $exhibition)
                <div class="swiper-slide h-full w-full">
                    <div class="relative h-full w-full">
                        <img class="absolute inset-0 -z-10 h-[542px] w-full object-cover object-center"
                             src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($exhibition->image) }}"
                             {{-- src="https://i0.wp.com/artjakarta.com/wp-content/uploads/2024/07/17-November-2023_Art-Jakarta_Opening_JIEXPO-Kemayoran_jinpanji-01407.jpg?fit=6000%2C4000&ssl=1" --}}
                             alt="">
                        <div class="absolute inset-0 h-[542px] bg-neutral-700 bg-opacity-10 group-hover/btncont:bg-opacity-80 transition-all duration-300"></div>
                        <div class="absolute inset-0 z-30 flex h-[542px] w-full items-center justify-center">
                            <div class="flex flex-col items-center gap-3 text-white drop-shadow-[0_4px_2px_rgba(0,0,0,0.25)]">
                                <div class="flex flex-col items-center gap-1">
                                    <h2 class="font-poppins text-3xl font-bold text-center">{{ $exhibition->name }}</h2>
                                    <p class="font-poppins text-lg font-semibold">{{ $exhibition->formatted_date_range }}</p>
                                    <p class="font-poppins text-lg font-semibold capitalize">{{ $exhibition->city }}</p>
                                </div>
                                <a href="{{ route('exhibition.show', $exhibition->slug) }}" class="mt-4 rounded-md bg-white px-14 py-2 font-poppins text-lg font-semibold text-black">
                                    Beli Tiket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- next/prev --}}
        @if (count($exhibitions) > 1)
            <div class="z-10 transition-all ease-in-out md:block">
                <div class="prev absolute bottom-5 left-16 z-10 flex h-10 w-10 transform cursor-pointer items-center justify-center rounded-full bg-white text-black shadow-[4px_4px_4px_rgba(0,0,0,0.25)] transition-all delay-75 ease-in-out lg:left-24">
                    <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </div>
                <div
                     class="next absolute bottom-5 right-16 z-10 flex h-10 w-10 transform cursor-pointer items-center justify-center rounded-full bg-white text-black shadow-[4px_4px_4px_rgba(0,0,0,0.25)] transition-all delay-75 ease-in-out lg:right-24">
                    <svg class="size-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplayDisableOnInteraction: false,
        slidesPerView: 1,
        autoHeight: true,
        speed: 1000,
        effect: 'fade',
        autoplay: {
            delay: 3000,
        },
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
                progressBar.style.backgroundColor = "grey";
                progressBar.style.width = '100%';
                progressBar.style.transition = 'width 5s ease-in-out';
            } else {
                progressBar.style.backgroundColor = "transparent";
                progressBar.style.width = '0%';
            }
            // Mengurangi ukuran dot secara menyeluruh ketika progress mencapai 100%
            bullet.style.width = isActive ? '40px' : '40px';
            bullet.style.transition = 'width 0.5s ease-in-out'; // Transisi smooth
        });
    });
</script>
