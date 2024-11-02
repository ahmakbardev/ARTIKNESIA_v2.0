@extends('layouts.layout')
@section('content')
    <h1 class="text-2xl font-bold">Daftar Transaksi</h1>
    <div class="flex flex-col gap-y-4">
        @if(count($orderItems) > 0)
            @foreach($orderItems as $item)
                <div class="border border-gray-300 rounded-lg px-4 py-7">
                    <h3 class="text-lg font-semibold">Invoice: {{$item->product}}</h3>
                    <p>Jumlah: {{ $item->quantity }}</p>
                    <p>Harga Karya: {{ \App\Helpers\Universal::idr($item->price) }}</p>
                    <p>Total Bayar: {{ \App\Helpers\Universal::idr($item->price * $item->quantity, 2,',','.') }}</p>
                    <p>
                        Kurir: {{ $item->courier . ' ' . \App\Helpers\Universal::idr($item->cost, 2,',','.') }}</p>
                    <p>
                        Resi: {{ ($item->resi) ? $item->resi : 'Belum dikirim' }}</p>
                </div>
            @endforeach
        @else
            <p>Tidak ada transaksi</p>
        @endif
    </div>
@endsection
