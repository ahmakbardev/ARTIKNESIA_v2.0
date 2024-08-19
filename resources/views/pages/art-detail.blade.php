@extends('layouts.layout')
@section('content')
    <livewire:detail-art :art="$art"></livewire:detail-art>

    <div class="mt-10">
        <h1 class="text-lg font-semibold">History Negotiation</h1>
        <h2 class="text-base ">Batch 1</h2>
        <table class="table-auto border-collapse border border-gray-300 w-full">
            <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">Row 1, Cell 1</td>
            </tr>
            </tbody>
        </table>

        <h2 class="text-base ">Batch Belum Dimulai</h2>
    </div>
@endsection
