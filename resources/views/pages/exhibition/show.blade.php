@extends('layouts.layout2')

@section('content')
    @php
        $shareIconImages = [
            [
                'icon_path' => 'images/icons/linkedin-icon.svg',
                'func_name' => "shareToSocialMedia('linkedin')",
            ],
            [
                'icon_path' => 'images/icons/facebook-icon.svg',
                'func_name' => "shareToSocialMedia('facebook')",
            ],
            [
                'icon_path' => 'images/icons/copy.svg',
                'func_name' => 'copyURL()',
            ],
        ];
    @endphp
    <div class="container mx-auto py-2 md:py-10">
        <div class="grid grid-cols-12 gap-y-5 md:gap-x-10">

            <div class="col-span-12 md:col-span-9 flex flex-col gap-5">
                {{-- <img src="{{ \Illuminate\Support\Facades\Storage::url($exhibition->banner) }}" alt="{{ $exhibition->slug }}" --}}
                <img src="http://127.0.0.1:8000/storage/{{ $exhibition->banner }}" alt="{{ $exhibition->slug }}"
                    class="w-full rounded-xl object-cover" />

                <div class="mt-2">
                    <h4 class="mb-3 font-poppins font-semibold text-xl ">Galery</h4>
                    {{-- Galery --}}
                    <div class="flex justify-center gap-2">
                        @foreach ($images_exhibition as $item)
                            <div class="object-cover h-52 w-96">
                                <img src="http://127.0.0.1:8000/storage/{{ $item->image_path }}"
                                    alt="{{ $item->image_path }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Deskripsi Pameran  --}}
                <div class="flex flex-col gap-5">
                    <h1 class="text-xl font-semibold">Deskripsi</h1>
                    <p class="text-sm">{{ $exhibition->description }}</p>
                </div>

                {{-- For Sharing Sosmed --}}
                <div class="mt-2">
                    <h4 class="mb-3 font-poppins font-semibold text-xl ">Share Now</h4>
                    <div class="left-[calc(100%+2.7rem)] hidden w-[275px] text-sm xl:block">

                        <div class="mb-1">
                            <ul class="flex gap-4">
                                @foreach ($shareIconImages as $item)
                                    <li>
                                        <button onclick="{{ $item['func_name'] }}" data-tooltip-target="tooltip-click"
                                            data-tooltip-trigger="click">
                                            <img src="{{ asset($item['icon_path']) }}" class="size-5" alt="">
                                        </button>
                                    </li>
                                    @if ($item['icon_path'] === 'images/icons/copy.svg')
                                        <div id="tooltip-click" role="tooltip"
                                            class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                            Copied
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-3">
                <div class="sticky top-32 p-8 flex flex-col justify-between gap-10 h-fit border border-gray-300 rounded-xl">
                    <h1 class="font-bold text-2xl">{{ $exhibition->name }}</h1>
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-solid fa-location-dot text-xl"></i>
                            <p class="text-sm">{{ $exhibition->address }}</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <i class="fas fa-regular fa-calendar-days text-xl"></i>
                            <p class="text-sm">{{ $exhibition->formatted_date_range }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <h1 class="text-xl font-bold">Harga Tiket</h1>
                        <div class="w-full h-fit rounded-lg grid grid-cols-2 justify-between items-center">
                            <p class="text-lg font-semibold">{{ $exhibition->formatted_price }}</p>
                            <a href="{{ $exhibition->link }}"
                                class="bg-primary text-center text-base text-white font-normal px-0 py-1 rounded-lg transition-colors">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyURL() {
            navigator.clipboard.writeText(window.location.href)
        }

        function shareToSocialMedia(socialMedia) {
            const currentURL = encodeURIComponent(window.location.href);
            let shareURL;
            switch (socialMedia) {
                case 'facebook':
                    shareURL = `https://www.facebook.com/sharer/sharer.php?u=${currentURL}`;
                    break;
                case 'linkedin':
                    shareURL = `https://www.linkedin.com/sharing/share-offsite/?url=${currentURL}`;
                    break;
                default:
                    throw new Error('Invalid social media');
                    break;
            }
            window.open(shareURL, '_blank');
        }
    </script>
@endsection
