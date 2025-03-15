@props([
    'variant' => 'info',
    'dismissible' => false,
])

@php
    $variants = [
        'info' => [
            'bg' => 'bg-info/10',
            'border' => 'border-info/20',
            'text' => 'text-info',
            'icon' => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
        ],
        'success' => [
            'bg' => 'bg-success/10',
            'border' => 'border-success/20',
            'text' => 'text-success',
            'icon' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
        ],
        'warning' => [
            'bg' => 'bg-warning/10',
            'border' => 'border-warning/20',
            'text' => 'text-warning',
            'icon' => '<path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>'
        ],
        'error' => [
            'bg' => 'bg-error/10',
            'border' => 'border-error/20',
            'text' => 'text-error',
            'icon' => '<path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
        ],
    ];
@endphp

<div 
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-2"
    class="relative flex gap-3 p-4 rounded-xl border {{ $variants[$variant]['bg'] }} {{ $variants[$variant]['border'] }}"
>
    <div class="flex-shrink-0">
        <svg class="size-5 {{ $variants[$variant]['text'] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            {!! $variants[$variant]['icon'] !!}
        </svg>
    </div>
    
    <div class="flex-1 {{ $variants[$variant]['text'] }}">
        {{ $slot }}
    </div>

    @if($dismissible)
        <button 
            @click="show = false"
            type="button" 
            class="flex-shrink-0 {{ $variants[$variant]['text'] }} hover:opacity-75 focus:outline-none"
        >
            <span class="sr-only">Dismiss</span>
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    @endif
</div> 