<div class="my-20 max-w-[1444px] mx-5 lg:mx-auto lg:px-16 2xl:px-36">
    <h4 class="text-xl font-bold mb-5 xl:mb-3">Artikel Lainnya</h4>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:grid-cols-3 xl:gap-12 2xl:gap-14">
        @foreach ($recommendedArticles as $item)
            <a href="{{ route('article.show', $item->slug) }}"
               class="flex flex-col overflow-hidden rounded-xl border bg-white font-poppins shadow-md">
                <img class="h-52 w-full object-cover object-center"
                     src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}"
                     alt="{{ $item->image_caption }}">
                <div class="flex flex-1 flex-col justify-between gap-3 px-3 py-2 lg:p-4">
                    <h5 class="line-clamp-2 text-sm font-semibold leading-6 lg:text-lg">{{ $item->short_title }}</h5>
                    <div class="flex flex-row items-center justify-between gap-3 text-[0.65rem] md:gap-6">
                        <div class="flex items-center gap-2">
                            <img class="w-5 rounded-full object-contain"
                                 src="{{ asset('images/profile/default.png') }}" alt="">
                            <div class="flex flex-col">

                                <p class="truncate">
                                    Oleh <span class="font-semibold">{{ $item->author->name }}</span>
                                </p>
                                <p>
                                    {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-0.5 text-neutral-500">
                            <img src="{{ asset('images/icons/view-counts.svg') }}" class="size-4" alt="">
                            <p class="relative top-[0.035rem] self-end font-semibold">{{ \App\Helpers\Universal::formatViewCount($item->view_count) }}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
