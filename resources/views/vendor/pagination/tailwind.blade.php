@if ($paginator->hasPages())
    <div class="flex gap-3 self-center">
        {{-- Previous Button --}}
        @if ($paginator->onFirstPage())
            <div
                class="size-10 border border-gray-400 bg-gray-400 text-lg text-white font-bold rounded-md flex items-center justify-center">
                <
            </div>
        @else
            <button wire:click="previousPage"
                    class="size-10 border border-primary bg-white hover:bg-primary text-lg text-black hover:text-white font-bold rounded-md flex items-center justify-center">
                <
            </button>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $pageRange = 5;

            $start = max(1, $currentPage - floor($pageRange / 2));
            $end = min($start + $pageRange - 1, $lastPage);

            if ($end == $lastPage) {
                $start = max(1, $end - $pageRange + 1);
            }
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            <button wire:click="gotoPage({{ $i }})"
                    class="size-10 border border-primary {{ $i == $currentPage ? 'bg-primary text-white' : 'bg-white text-black hover:bg-primary hover:text-white' }} font-bold rounded-md flex items-center justify-center">
                {{ $i }}
            </button>
        @endfor

        {{-- Next Button --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage"
                    class="size-10 border border-primary bg-white hover:bg-primary text-lg text-black hover:text-white font-bold rounded-md flex items-center justify-center">
                >
            </button>
        @else
            <div
                class="size-10 border border-gray-400 bg-gray-400 text-lg text-white font-bold rounded-md flex items-center justify-center">
                >
            </div>
        @endif
    </div>
@endif
