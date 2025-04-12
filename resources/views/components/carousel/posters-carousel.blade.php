@php
    $posters = ['1', '2', '3'];
@endphp

<div class="header group/btncont group/btn relative mb-5 w-[290px] overflow-x-visible h-[380px]">
    <div class="swiper-container overflow-hidden rounded-xl border-2 border-neutral-300">
        {{-- wrapper(isi carousel) --}}
        <div class="swiper-wrapper">
            @foreach ($posters as $item)
                <div class="swiper-slide">
                    <a href=""
                       class="relative">
                        <img class="h-full w-full object-cover object-center"
                             {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}" --}}
                             src="https://s3-alpha-sig.figma.com/img/e54e/dadb/09d785ee8831a2d1c49d858b8275d9c0?Expires=1743984000&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=UjHFzcKM256XAvpOo1qZ~nWitK7Wi533uDXA~wzLiJrT1DrKtlW4GhJ0MmXGIy5zcqPkT5GiZlLBdXAB7xCkdrLVk-9D9kJMQkVOdRkCu1aCYj~C25EUpy8z1WHD2-S4yUXer7FpmqnxVVZ3ds6nJxyzJcS0LFl6F1OTQle6LgpXn1AuPPt4CwLs4WZILvJNiC62~BK-2CpN7D0qrqZfmdN6p4eBm-gBzyLESXkghQclaLVGJZmh1Th0M6~CCXTwZ62vijsI3VAuEHvO-38Jq96D7xq6z3XLwByVU~V-r4lw668iZxc4ddsxZforSCr1kez3l0bk-cNeFhs1-64daA__"
                             alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Indikator Carousel -->
        <div class="article-swiper-pagination absolute left-[62%] top-[calc(100%+2rem)] w-3/4 -translate-x-1/2">
            <div class="swiper-pagination w-fit"></div>
        </div>
        {{-- next/prev --}}
        <div class="z-10 hidden opacity-0 transition-all ease-in-out group-hover/btncont:opacity-100 md:block">
            <div
                 class="prev absolute left-2 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 transform cursor-pointer items-center justify-center rounded-full border border-primary bg-white text-primary transition-all delay-75 ease-in-out hover:bg-primary hover:text-white xl:group-hover/btn:-left-5">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </div>
            <div
                 class="next absolute right-2 top-1/2 z-10 flex h-10 w-10 -translate-y-1/2 transform cursor-pointer items-center justify-center rounded-full border border-primary bg-white text-primary transition-all delay-75 ease-in-out hover:bg-primary hover:text-white xl:group-hover/btn:-right-5">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
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
