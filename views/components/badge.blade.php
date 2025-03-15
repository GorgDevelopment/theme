@props([
    'variant' => 'default',
    'size' => 'md',
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium';
    
    $variants = [
        'default' => 'bg-base-200 text-base-content',
        'primary' => 'bg-primary/10 text-primary',
        'secondary' => 'bg-secondary/10 text-secondary',
        'accent' => 'bg-accent/10 text-accent',
        'success' => 'bg-success/10 text-success',
        'warning' => 'bg-warning/10 text-warning',
        'error' => 'bg-error/10 text-error',
        'info' => 'bg-info/10 text-info',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs rounded-md gap-1',
        'md' => 'px-2.5 py-1 text-sm rounded-lg gap-1.5',
        'lg' => 'px-3 py-1.5 text-base rounded-xl gap-2',
    ];

    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span> 