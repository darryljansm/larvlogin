@props([
    'readyToLoad' => false,
    'items' => null,
    'lazy' => false,
    'tableName' => null,
    'theme' => null,
])
<div @isset($this->setUp['responsive']) x-data="pgResponsive" @endisset>
    <div x-data="{ expandedId: null }">
        <table
            id="table_base_{{ $tableName }}"
            class="min-w-full shadow-sm rounded-lg overflow-hidden"
        >
            <thead class="bg-gray-50 text-black uppercase tracking-wider text-sm">
                {{ $header }}
            </thead>

            @if ($readyToLoad)
                <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                    {{ $body }}
                </tbody>
            @else
                <tbody class="bg-white divide-y divide-gray-200">
                    {{ $loading }}
                </tbody>
            @endif
        </table>
    </div>

    {{-- infinite pagination handler --}}
    @if ($this->canLoadMore && $lazy)
        <div class="justify-center items-center" wire:loading.class="flex" wire:target="loadMore">
            @include(data_get($theme, 'root') . '.header.loading')
        </div>

        <div x-data="pgLoadMore"></div>
    @endif
</div>
