@if ($paginator->hasPages())
    <div class="flex gap-3 justify-center">
        {{-- Previous Button --}}
        @if ($paginator->onFirstPage())
            <div
                class="size-10 border border-gray-200 text-lg text-gray-400 font-bold rounded-md flex items-center justify-center">
                <
            </div>
        @else
            <button wire:click="previousPage"
                    class="size-10 border border-gray-400 bg-white text-lg text-black font-bold rounded-md flex items-center justify-center hover:border-primary-darker hover:text-primary-darker">
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
                    class="size-10 border {{ $i == $currentPage ? 'border-primary text-primary' : 'border-gray-400 bg-white text-black hover:border-primary-darker hover:text-primary-darker' }} font-bold rounded-md flex items-center justify-center">
                {{ $i }}
            </button>
        @endfor

        {{-- Next Button --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage"
                    class="size-10 border border-gray-400 bg-white text-lg text-black font-bold rounded-md flex items-center justify-center hover:border-primary-darker hover:text-primary-darker">
                >
            </button>
        @else
            <div
                class="size-10 border border-gray-200 text-lg text-gray-400 font-bold rounded-md flex items-center justify-center">
                >
            </div>
        @endif
    </div>
@endif
