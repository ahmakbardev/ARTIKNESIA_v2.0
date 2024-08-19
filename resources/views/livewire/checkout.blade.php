<div>
    <div class="grid grid-cols-7 my-5 gap-x-4">
        <div class=" flex flex-col gap-y-5 col-span-5">
            @if(count($checkoutItem) > 0)
                <div class="border border-gray-300 rounded-lg px-4 py-6">
                    <h1 class="text-lg font-bold">Alamat Pengiriman</h1>
                    <form>
                        <div class="mb-3 flex flex-col">
                            <label>Alamat Lengkap</label>
                            <textarea type="text" class="border border-gray-300 rounded-lg py-2 px-3"></textarea>
                        </div>
                        <div class="mb-3 flex flex-col">
                            <label>Kota</label>
                            <select class="border border-gray-300 rounded-lg py-2 px-3 appearance-none"
                                    wire:change="updateCity($event.target.value)">
                                <option disabled hidden @selected(!$selectedCity)>Pilih Kota</option>
                                @foreach($cities as $item)
                                    <option
                                        value="{{ $item->id }}" @selected($item->id == $selectedCity)>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="border border-gray-300 rounded-lg px-4 py-6">
                    <h2 class="text-lg font-bold">Daftar Pesanan</h2>
                    <div class="mt-3 flex flex-col gap-y-3 w-full">
                        @foreach($checkoutItem as $index => $item)
                            <div class="grid grid-cols-8 gap-x-3">
                                <img src="{{ $item['image'] }}" class="rounded-lg object-cover h-full col-span-2"
                                     alt=""/>
                                <div class="col-span-6 text-start flex flex-col justify-between pe-4 gap-y-3">
                                    <div class="flex flex-row justify-between items-end">
                                        <h6 class="text-xl font-normal line-clamp-1">{{ $item['name'] }}</h6>
                                        <p class="text-xl font-normal w-fit">{{ $item['quantity'] }}
                                            x${{ $item['price'] }}</p>
                                    </div>
                                    <select class="border border-gray-300 rounded-lg py-2 px-3 appearance-none"
                                            @if(!$selectedCity) disabled @endif
                                            wire:change="updateKurir('{{ $index }}', $event.target.value)">
                                        <option disabled hidden @selected($item['courier'] == null)>Pilih Kurir
                                        </option>
                                        <option value="jne" @selected($item['courier'] == 'jne')>JNE</option>
                                        <option value="tiki" @selected($item['courier'] == 'tiki')>TIKI</option>
                                        <option value="pos" @selected($item['courier'] == 'pos')>POS Indonesia</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center text-sm w-full">Kosong</p>
            @endif
        </div>
        <div class="col-span-2 border border-gray-300 rounded-lg px-4 py-6 h-fit flex flex-col gap-y-3">
            <h2 class="font-bold text-lg">Ringkasan Biaya</h2>
            <ul>
                <li class="flex items-center justify-between"><span>Total Harga</span><span>${{ $price }}</span></li>
                <li class="flex items-center justify-between">
                    <span>Total Ongkos Kirim</span><span>${{ $courierCost }}</span></li>
            </ul>
            <hr/>
            <ul>
                <li class="flex items-center justify-between">
                    <span>Total Belanja</span><span>${{ $price + $courierCost }}</span></li>
            </ul>
            <button
                type="button"
                wire:click="checkout"
                class="bg-primary cursor-pointer @if($courierCount !== count($checkoutItem))cursor-not-allowed bg-opacity-50 @endif rounded-lg w-full py-2 text-white font-bold">
                Pilih Pembayaran
            </button>
        </div>
    </div>
</div>
