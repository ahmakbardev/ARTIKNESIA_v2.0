<div class="header group/btncont group/btn relative mb-5 max-h-32 w-full overflow-x-visible md:max-h-72 lg:max-h-96">
    <div class="swiper-container overflow-hidden rounded-xl border-2 border-neutral-300">
        {{-- wrapper(isi carousel) --}}
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="{{ route('article.show', $article->slug) }}"
                   class="relative font-poppins">
                    <img class="h-32 w-full object-cover object-center"
                         src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                         alt="{{ $article->image_caption }}">
                    <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/90 px-1 text-[0.6rem]">
                        <h5 class="truncate font-semibold">{{ $article->short_title }}</h5>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-0.5">
                                <img class="w-3 rounded-full object-contain"
                                     src="{{ asset('images/profile/default.png') }}" alt="">
                                <div>
                                    <p class="max-w-36 truncate ">Oleh {{ $article->author->name }}</p>
                                </div>
                            </div>
                            <p class="">
                                {{ \Illuminate\Support\Carbon::parse($article->created_at)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('article.show', $article->slug) }}"
                   class="relative font-poppins">
                    <img class="h-32 w-full object-cover object-center"
                         src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                         alt="{{ $article->image_caption }}">
                    <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/90 px-1 text-[0.6rem]">
                        <h5 class="truncate font-semibold">{{ $article->short_title }}</h5>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-0.5">
                                <img class="w-3 rounded-full object-contain"
                                     src="{{ asset('images/profile/default.png') }}" alt="">
                                <div>
                                    <p class="max-w-36 truncate ">Oleh {{ $article->author->name }}</p>
                                </div>
                            </div>
                            <p class="">
                                {{ \Illuminate\Support\Carbon::parse($article->created_at)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ route('article.show', $article->slug) }}"
                   class="relative font-poppins">
                    <img class="h-32 w-full object-cover object-center"
                         src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($article->image) }}"
                         alt="{{ $article->image_caption }}">
                    <div class="absolute bottom-0 left-0 right-0 bg-neutral-200/90 px-1 text-[0.6rem]">
                        <h5 class="truncate font-semibold">{{ $article->short_title }}</h5>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-0.5">
                                <img class="w-3 rounded-full object-contain"
                                     src="{{ asset('images/profile/default.png') }}" alt="">
                                <div>
                                    <p class="max-w-36 truncate ">Oleh {{ $article->author->name }}</p>
                                </div>
                            </div>
                            <p class="">
                                {{ \Illuminate\Support\Carbon::parse($article->created_at)->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- Indikator Carousel -->
        <div class="article-swiper-pagination absolute left-[61%] top-[calc(100%+2rem)] w-3/4 -translate-x-1/2">
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
                progressBar.style.backgroundColor = "grey";
                progressBar.style.width = '100%';
                progressBar.style.transition = 'width 5s ease-in-out';
            } else {
                progressBar.style.backgroundColor = "transparent";
            }
            // Mengurangi ukuran dot secara menyeluruh ketika progress mencapai 100%
            // bullet.style.width = isActive ? '8px' : '8px';
            bullet.style.transition = 'width 0.5s ease-in-out'; // Transisi smooth
        });
    });
</script>
