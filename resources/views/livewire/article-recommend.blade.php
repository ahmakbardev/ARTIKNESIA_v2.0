<div class="mx-5 my-20 max-w-[1444px] lg:mx-auto">
    <h4 class="mb-5 text-xl font-bold xl:mb-3">Artikel Lainnya</h4>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 xl:flex xl:gap-5">
        @foreach ($recommendedArticles as $item)
            <a href="{{ route('article.show', $item->slug) }}"
               class="flex flex-col overflow-hidden rounded-xl border bg-white font-poppins shadow-md xl:aspect-[3/4] xl:flex-1">
                <div class="xl:h-4/6">
                    <img class="h-60 w-full object-cover object-center xl:h-full"
                         {{-- src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($item->image) }}" --}}
                         src="https://images.unsplash.com/photo-1605721911519-3dfeb3be25e7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGFydHxlbnwwfHwwfHx8MA%3D%3D"
                         src="https://images.unsplash.com/photo-1578301978018-3005759f48f7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YXJ0fGVufDB8fDB8fHww"
                         alt="{{ $item->image_caption }}">
                </div>
                <div class="flex flex-1 flex-col justify-between gap-3 px-3 py-2 lg:p-4 xl:h-2/6 xl:px-3 xl:py-2">
                    <h5 class="text-sm font-semibold leading-6 lg:text-lg xl:text-sm xl:truncate"
                       >{{ $item->short_title }}</h5>
                    <div class="flex flex-row items-center justify-between gap-3 text-[0.55rem] md:gap-6">
                        <div class="flex items-center gap-2">
                            <img class="w-5 rounded-full object-contain"
                                 src="{{ asset('images/profile/default.png') }}" alt="">
                            <div class="flex flex-col truncate">
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
