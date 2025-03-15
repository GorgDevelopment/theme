@props([
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'loading' => false,
    'type' => 'button',
    'href' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-base-100 disabled:opacity-60 disabled:cursor-not-allowed relative';
    
    $variants = [
        'primary' => 'bg-primary hover:bg-primary/90 text-white focus:ring-primary/20',
        'secondary' => 'bg-secondary hover:bg-secondary/90 text-white focus:ring-secondary/20',
        'accent' => 'bg-accent hover:bg-accent/90 text-white focus:ring-accent/20',
        'success' => 'bg-success hover:bg-success/90 text-white focus:ring-success/20',
        'warning' => 'bg-warning hover:bg-warning/90 text-white focus:ring-warning/20',
        'error' => 'bg-error hover:bg-error/90 text-white focus:ring-error/20',
        'info' => 'bg-info hover:bg-info/90 text-white focus:ring-info/20',
        'outline' => 'border-2 border-base-content/20 hover:bg-base-content/10 text-base-content focus:ring-base-content/20',
        'ghost' => 'hover:bg-base-content/10 text-base-content focus:ring-base-content/20',
        'link' => 'underline-offset-4 hover:underline text-base-content focus:ring-base-content/20',
    ];

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs rounded-lg gap-1.5',
        'sm' => 'px-3 py-2 text-sm rounded-lg gap-2',
        'md' => 'px-4 py-2.5 text-base rounded-xl gap-2',
        'lg' => 'px-6 py-3 text-lg rounded-xl gap-3',
        'xl' => 'px-8 py-4 text-xl rounded-2xl gap-4',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($loading)
            <svg class="animate-spin -ml-1 mr-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled || $loading]) }}>
        @if($loading)
            <svg class="animate-spin -ml-1 mr-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        @endif
        {{ $slot }}
    </button>
@endif 