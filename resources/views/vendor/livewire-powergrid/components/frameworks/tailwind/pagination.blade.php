{{-- Main pagination --}}
@if ($paginator->hasPages() && !in_array($recordCount, ['min', 'short']))
    <nav role="navigation" aria-label="Pagination Navigation" class="items-center justify-between sm:flex">
        <div class="flex justify-center mt-2 md:flex-none md:justify-end sm:mt-0 space-x-1">

            {{-- First Page --}}
            @if (!$paginator->onFirstPage())
                <button
                    wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-600 transition"
                >
                    «
                </button>

                {{-- Previous --}}
                <button
                    wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    class="px-3 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-600 transition"
                >
                    ‹
                </button>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span
                                class="px-3 py-2 bg-gray-300 text-gray-800 rounded-md shadow cursor-default">
                                {{ $page }}
                            </span>
                        @else
                            <button
                                wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                class="px-3 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-md transition"
                            >
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <button
                    wire:click="nextPage('{{ $paginator->getPageName() }}')"
                    class="px-3 py-2 bg-gray-300 ttext-gray-800 rounded-md hover:bg-gray-600 transition"
                >
                    ›
                </button>

                {{-- Last Page --}}
                <button
                    wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')"
                    class="px-3 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-600 transition"
                >
                    »
                </button>
            @endif
        </div>
    </nav>
@endif
