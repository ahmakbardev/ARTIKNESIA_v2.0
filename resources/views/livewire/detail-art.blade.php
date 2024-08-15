<div class="flex flex-row gap-x-10">
    <img src="{{ $art->images[0] }}" alt="{{ $art->name }}" class="rounded-2xl w-2/6"/>
    <div class="flex flex-col gap-y-4">
        <h1 class="text-lg font-semibold">{{ $art->name }}</h1>
        <p class="text-3xl font-extrabold">${{ $art->price }}</p>
    </div>
    <div class="w-2/6 border border-gray-300 rounded-2xl p-4 flex flex-col gap-3 justify-between">
        <h2 class="font-semibold">Atur jumlah dan catatan</h2>
        <div class="flex flex-row items-center gap-5">
            <input type="number" class="border border-gray-400 rounded-lg h-8 w-1/2 px-3 text-center" min="1"
                   max="{{ $art->stock }}"
                   value="1"/>
            <span>Stok {{ $art->stock }}</span>
        </div>
        <div class="flex flex-col gap-3">
            <div class="flex gap-3">
                <button wire:click="addToCart({{$art->id}})" class="bg-primary p-2 rounded-lg text-white w-full">Keranjang</button>
                <button class="bg-primary p-2 rounded-lg text-white w-full">Nego</button>
            </div>
            <button class="bg-primary p-2 rounded-lg text-white w-full">Beli Langsung</button>
        </div>
    </div>
</div>
