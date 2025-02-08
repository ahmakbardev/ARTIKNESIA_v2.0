<div>
    <div class="relative grid grid-cols-1 md:grid-cols-7 my-5 gap-4">
        <div wire:loading.delay.long wire:target="checkout"
             class="absolute bg-white bg-opacity-60 z-10 h-full w-full block">
            <div class="h-full w-full flex items-center justify-center">
                <div class="flex items-center">
                    <svg class="animate-spin size-10 text-primary" xmlns="http://www.w3.org/2000/svg"
                         fill="none"
                         viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-y-5 col-span-1 md:col-span-5 w-full">
            @if(count($checkoutItem) > 0)
                <div class="border border-gray-300 rounded-lg px-4 py-6">
                    <h1 class="text-lg font-bold">Alamat Pengiriman</h1>
                    <form>
                        <div class="mb-3 flex flex-col">
                            <label>Nama Lengkap</label>
                            <input type="text" class="border border-gray-300 rounded-lg py-2 px-3"
                                   wire:model="full_name"/>
                            <span class="text-red-500 text-sm">@error('full_name') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label>Alamat Lengkap</label>
                            <textarea class="border border-gray-300 rounded-lg py-2 px-3"
                                      wire:model="address"></textarea>
                            <span class="text-red-500 text-sm">@error('address') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label>Kota</label>
                            <select class="border border-gray-300 rounded-lg py-2 px-3 appearance-none"
                                    wire:change="updateCity($event.target.value)" wire:model.defer>
                                <option @if(is_null($selectedCity)) selected @endif>Pilih Kota</option>
                                @foreach($cities as $item)
                                    <option
                                        value="{{ $item->id }}" @selected($item->id == $selectedCity)>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="relative">
                    <div wire:loading.delay.long wire:target="updateCity"
                         class="absolute bg-white bg-opacity-60 z-10 h-full w-full block">
                        <div class="h-full w-full flex items-center justify-center">
                            <div class="flex items-center">
                                <svg class="animate-spin size-10 text-primary" xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded-lg px-4 py-6">
                        <h2 class="text-lg font-bold">Daftar Pesanan</h2>
                        <div class="mt-3 flex flex-col gap-y-3 w-full">
                            @foreach($checkoutItem as $index => $item)
                                <div class="grid grid-cols-1 md:grid-cols-8 gap-3">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item['image']) }}"
                                         class="rounded-lg object-cover h-24 w-full col-span-1 md:col-span-2"
                                         alt=""/>
                                    <div
                                        class="col-span-1 md:col-span-6 text-start flex flex-col justify-between md:pe-4 gap-y-3">
                                        <div class="flex flex-row justify-between items-end">
                                            <h6 class="text-xl font-normal line-clamp-1">{{ $item['name'] }}</h6>
                                            <p class="text-xl font-normal w-fit">{{ $item['quantity'] }}
                                                x {{ \App\Helpers\Universal::idr($item['price']) }}</p>
                                        </div>
                                        <select
                                            class="border border-gray-300 rounded-lg py-2 px-3 appearance-none w-full"
                                            @if(!$selectedCity) disabled @endif
                                            wire:change="updateKurir('{{ $index }}', $event.target.value)">
                                            <option disabled hidden @selected($item['courier'] == null)>Pilih Kurir
                                            </option>
                                            <option value="jne" @selected($item['courier'] == 'jne')>JNE</option>
                                            <option value="tiki" @selected($item['courier'] == 'tiki')>TIKI</option>
                                            <option value="pos" @selected($item['courier'] == 'pos')>POS Indonesia
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center text-sm w-full">Kosong</p>
            @endif
        </div>
        <div class="relative col-span-2 h-fit">
            <div wire:loading.delay.long wire:target="updateKurir"
                 class="absolute bg-white bg-opacity-60 z-10 h-full w-full block">
                <div class="h-full w-full flex items-center justify-center">
                    <div class="flex items-center">
                        <svg class="animate-spin size-10 text-primary" xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 rounded-lg px-4 py-6 flex flex-col gap-y-3">
                <h2 class="font-bold text-lg">Ringkasan Biaya</h2>
                <ul>
                    <li class="flex items-center justify-between">
                        <span>Total Harga</span><span>{{ \App\Helpers\Universal::idr($price) }}</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>Total Ongkos Kirim</span><span>${{ $courierCost }}</span></li>
                </ul>
                <hr/>
                <ul>
                    <li class="flex items-center justify-between">
                        <span>Total Belanja</span><span>{{ \App\Helpers\Universal::idr($price + $courierCost) }}</span>
                    </li>
                </ul>
                <button
                    type="button"
                    wire:click="checkout"
                    class="bg-primary @if($courierCount !== count($checkoutItem))cursor-not-allowed bg-opacity-50 @else cursor-pointer @endif rounded-lg w-full py-2 text-white font-bold"
                    @if($courierCount !== count($checkoutItem)) disabled @endif>
                    Pilih Pembayaran
                </button>
            </div>
        </div>
    </div>
</div>
