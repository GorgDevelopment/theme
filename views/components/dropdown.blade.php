@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1',
])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
    case '96':
        $width = 'w-96';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $width }} rounded-xl shadow-lg {{ $alignmentClasses }}"
        style="display: none;"
        @click="open = false"
    >
        <div class="rounded-xl ring-1 ring-base-300 bg-base-100 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

@pushOnce('styles')
<style>
    .dropdown-item {
        @apply block w-full px-4 py-2 text-sm leading-5 text-left text-base-content hover:bg-base-200 focus:outline-none focus:bg-base-200 transition-colors;
    }

    .dropdown-header {
        @apply px-4 py-2 text-sm font-medium text-base-content/70;
    }

    .dropdown-separator {
        @apply border-t border-base-200 my-1;
    }
</style>
@endPushOnce
