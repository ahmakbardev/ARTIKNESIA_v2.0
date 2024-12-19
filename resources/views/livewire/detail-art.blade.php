<div class="mt-0 md:mt-10">
    <div class="grid grid-cols-12 gap-6 items-start relative">
        <!-- Image Section -->
        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($art->images[0]) }}"
             alt="{{ $art->name }}"
             class="rounded-none md:rounded-2xl col-span-12 md:col-span-4 h-72 object-cover object-center block md:sticky md:top-10"/>

        <!-- Details Section -->
        <div class="col-span-12 md:col-span-5 px-3 md:px-0 flex flex-col gap-y-4">
            <div class="flex flex-col gap-y-1">
                <h1 class="text-lg md:text-2xl font-bold">{{ $art->name }}</h1>
                <span
                    class="text-sm md:text-lg font-light  text-gray-500">{{ $art->category->nama . ' • ' .$art->category->jenisKarya->nama}}</span>
                <p class="text-2xl md:text-4xl font-extrabold">{{ \App\Helpers\Universal::idr($art->price) }}</p>
            </div>
            <p class="text-sm md:text-base font-light  text-gray-700 leading-tight text-justify">{{ $art->philosophy }}</p>
            <hr/>
            <div class="flex flex-col gap-y-2">
                <h1 class="text-lg md:text-2xl font-semibold text-primary">Detail</h1>
                <div class="flex flex-col text-sm md:text-lg">
                    <p>Ukuran (Panjang x Lebar) : {{ $art->size_x . 'cm' . ' x '. $art->size_y . 'cm' }}</p>
                    <p>Berat : {{ $art->weight . 'g' }}</p>
                    <p>Bahan : {{ $art->material }}</p>
                </div>
            </div>
            <hr/>
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/profile/default.png') }}"
                     alt="author"
                     class="rounded-full size-10">
                <h1 class="text-sm font-normal">{{ $art->seniman->name }}</h1>
            </div>
        </div>

        <!-- Action Section -->
        <div
            class="col-span-12 md:col-span-3 border border-gray-300 rounded-none md:rounded-2xl p-4 flex flex-col gap-3 md:sticky md:top-10">
            <h2 class="font-semibold">Atur jumlah dan catatan</h2>
            <div class="flex flex-row items-center gap-5">
                <input type="number" class="border border-gray-400 rounded-lg h-8 px-3 text-center" min="1"
                       max="{{ $art->stock }}" value="1" wire:model="quantity"/>
                <span>Stok {{ $art->stock }}</span>
            </div>
            <div class="flex flex-col gap-3">
                <div class="flex gap-3">
                    <button wire:click="addToCart({{ $art->id }})" class="bg-primary p-2 rounded-lg text-white w-full">
                        Keranjang
                    </button>
                    @if($batch)
                        <button type="button" id="openModalBtn" class="bg-primary p-2 rounded-lg text-white w-full">Nego
                        </button>
                    @endif
                </div>
                <button type="button" wire:click="checkout({{ $art->id }})"
                        class="bg-primary p-2 rounded-lg text-white w-full">Beli Langsung
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modal"
         class="{{$errors->any() ? '' : 'hidden'}} w-full h-full fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Nego Karya</h3>
                <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="mb-4">
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                    <input type="number" wire:model="price"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"/>
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end">
                <button wire:click="negotiation" type="button"
                        class="bg-primary text-white px-4 py-2 rounded-lg">
                    Nego Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
