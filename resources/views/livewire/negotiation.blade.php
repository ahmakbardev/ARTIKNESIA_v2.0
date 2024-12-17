<div class="flex flex-col gap-y-4">
    @if(count($negotiations) > 0)
        @foreach($negotiations as $item)
            <div class="border border-gray-300 rounded-lg px-4 py-7">
                <h2 class="text-lg font-semibold">Negosiasi Batch {{$item->batch->batch}}</h2>
                <h3 class="text-lg font-semibold">{{$item->batch->product->name}}</h3>
                <p>Status: {{ $item->status }}</p>
                <p>Harga Nego: {{ \App\Helpers\Universal::idr($item->price) }} }}</p>
                @if($item->status == 'accept' && !$item->payment_status)
                    <button type="button" wire:click="checkout({{$item}})" class="text-primary">Bayar
                        Sekarang
                    </button>
                @endif
            </div>
        @endforeach
    @else
        <p>Tidak ada negosiasi</p>
    @endif
</div>
