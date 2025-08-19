{{-- @if (data_get($setUp, 'header.searchInput'))
    <div class="flex flex-row mt-3 md:mt-0 w-full rounded-full flex justify-start sm:justify-center md:justify-end">
        <div class="group relative rounded-full w-full md:w-4/12 float-end float-right md:w-full lg:w-1/2">
            <span class="absolute inset-y-0 left-0 flex items-center pl-1">
                <span class="p-1 focus:outline-none focus:shadow-outline">
                    <x-livewire-powergrid::icons.search
                        class="{{ theme_style($theme, 'searchBox.iconSearch') }}"
                    />
                </span>
            </span>
            <input
                wire:model.live.debounce.700ms="search"
                type="text"
                class="{{ theme_style($theme, 'searchBox.input') }}"
                placeholder="{{ trans('livewire-powergrid::datatable.placeholders.search') }}"
            >
            @if ($search)
                <span
                    class="absolute opacity-0 group-hover:opacity-100 transition-all inset-y-0 right-0 flex items-center"
                >
                    <span class="p-2 rounded-full focus:outline-none focus:shadow-outline cursor-pointer">
                        <a wire:click.prevent="$set('search','')">
                            <x-livewire-powergrid::icons.x
                                class="w-4 h-4 {{ theme_style($theme, 'searchBox.iconClose') }}"
                            />
                        </a>
                    </span>
                </span>
            @endif
        </div>
    </div>
@endif --}}

@if (data_get($setUp, 'header.searchInput'))
    <div class="flex flex-row mt-3 md:mt-0 w-full justify-start sm:justify-center md:justify-end">
        <div class="relative w-full md:w-4/12 lg:w-1/3">
            <!-- Search icon -->
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
                </svg>
            </span>

            <!-- Input -->
            <input
                wire:model.live.debounce.700ms="search"
                type="text"
                class="w-full pl-9 pr-8 py-2 border border-gray-300 rounded-full shadow-sm text-sm
                    focus:outline-none focus:ring-1 focus:ring-gray-300 focus:border-gray-300 placeholder-gray-400"
                placeholder="{{ trans('livewire-powergrid::datatable.placeholders.search') }}"
            >

            <!-- Clear button -->
            @if ($search)
                <span
                    class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400 hover:text-gray-600"
                    wire:click.prevent="$set('search','')"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </span>
            @endif
        </div>
    </div>
@endif
