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
    <div class="mx-auto my-7 max-w-[1444px] px-6 py-2 overflow-x-hidden lg:px-10 xl:px-16 2xl:px-0">
        <div class="mb-7 flex items-center gap-3 text-sm font-medium">
            <a href="/" class="hover:underline">Home</a><span class="text-lg">></span> <a href="{{ route('exhibition.index') }}" class="hover:underline">Pameran</a><span class="text-lg">></span>{{ $exhibition->name }}
        </div>

        <div class="flex w-full flex-col gap-6 lg:flex-row xl:gap-12">
            <div class="w-full lg:w-4/6">
                {{-- GAMBAR --}}
                <div class="h-[400px] w-full rounded-2xl">
                    @include('components.carousel.pameran-detail-carousel')
                </div>

                {{-- DESKRIPSI --}}
                <div class="mt-20">
                    <h2 class="border-b border-b-black pb-4 font-semibold">DESKRIPSI</h2>
                    <div class="mt-6">
                        {{ $exhibition->description }}
                    </div>
                </div>
            </div>


            <div class="h-full flex-1 mt-16 lg:mt-0">
                {{-- HARGA --}}
                <div class="flex min-h-[400px] flex-col justify-between rounded-xl p-8 shadow-[0_4px_4px_2px_rgba(0,0,0,0.25)]">
                    <div>
                        <h3 class="mb-7 text-xl font-semibold">{{ $exhibition->name }}</h3>
                        <div class="space-y-3 pb-7 text-sm">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('images/icons/location-icon-primary.svg') }}" class="size-5" alt="">
                                <p class="font-poppins capitalize">
                                    {{ $exhibition->city }}
                                </p>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('images/icons/calendar-icon-primary.svg') }}" class="size-5" alt="">
                                <p class="font-poppins">
                                    {{ $exhibition->formatted_date_range }}
                                </p>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('images/icons/money-icon-primary.svg') }}" class="size-5" alt="">
                                <p class="font-poppins">
                                    {{ $exhibition->formatted_price }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 border-t border-dashed border-neutral-500 pt-5">
                        <div class="text-sm">
                            <p class="font-poppins text-[#B5B5B5]">Diselenggarakan Oleh</p>
                            <p class="font-poppins font-bold">{{ $exhibition->organizer }}</p>
                        </div>
                        <div>
                            <a href="{{ $exhibition->status != 'completed' ? $exhibition->link : 'javascript:void(0)' }}"> 
                                <button class="w-full rounded-xl py-4 font-poppins text-sm font-semibold text-white {{$exhibition->status == 'completed' ? 'bg-status-completed cursor-default' : 'bg-primary'}}">{{ $exhibition->status != 'completed' ? 'Beli Tiket' : 'Tutup' }}</button>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SHARE --}}
                <div class="mt-20 flex flex-col items-center gap-4 justify-center lg:block">
                    <h4 class="mb-3 font-semibold">SHARE NOW</h4>
                    <div>
                        <ul class="flex gap-4">
                            @foreach ($shareIconImages as $item)
                                <li>
                                    <button onclick="{{ $item['func_name'] }}" data-tooltip-target="tooltip-click" data-tooltip-trigger="click">
                                        <img src="{{ asset($item['icon_path']) }}" class="size-5" alt="">
                                    </button>
                                </li>
                                @if ($item['icon_path'] === 'images/icons/copy.svg')
                                    <div id="tooltip-click" role="tooltip" class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
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
