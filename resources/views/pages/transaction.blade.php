@extends('layouts.layout')
@section('content')
    <h1 class="text-2xl font-bold">Daftar Negosiasi</h1>
    <livewire:negotiation :negotiations="$negotiations"></livewire:negotiation>
    <h1 class="text-2xl font-bold">Daftar Transaksi</h1>
    <div class="flex flex-col gap-y-4">
        @if(count($orders) > 0)
            @foreach($orders as $item)
                <div class="border border-gray-300 rounded-lg px-4 py-7">
                    <h3 class="text-lg font-semibold">Invoice: {{$item->invoice}}</h3>
                    <p>Status:
                        @if($item->status == 'pending')
                            Menunggu Pembayaran
                        @elseif($item->status == 'success')
                            Sudah dibayar
                        @else
                            Pembayaran gagal
                        @endif
                    </p>
                    <p>Total Belanja: Rp {{ number_format($item->total_price, 2,',','.') }}</p>
                    @if($item->status == 'pending')
                        <a href="{{ $item->snap_url }}" class="text-primary">Bayar Sekarang</a>
                    @endif
                    <a href="{{ route('transaction-detail',$item->id) }}" class="text-primary">Detail</a>
                </div>
            @endforeach
        @else
            <p>Tidak ada transaksi</p>
        @endif
    </div>

@endsection
