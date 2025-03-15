@props([
    'variant' => 'default',
    'hover' => false,
    'clickable' => false,
])

@php
    $baseClasses = 'relative overflow-hidden transition-all duration-200';
    
    $variants = [
        'default' => 'bg-base-100 border border-base-200/50',
        'glass' => 'backdrop-blur-xl bg-white/10 border border-white/20',
        'gradient' => 'bg-gradient-to-br from-primary/5 via-base-100 to-secondary/5',
        'solid' => 'bg-base-200',
    ];

    $effects = [
        'hover' => $hover ? 'hover:shadow-xl hover:scale-[1.02] hover:-translate-y-1' : '',
        'clickable' => $clickable ? 'cursor-pointer active:scale-[0.98]' : '',
    ];
    
    $classes = $baseClasses . ' ' . $variants[$variant] . ' ' . implode(' ', $effects);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if($variant === 'glass')
        <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-transparent to-secondary/10 opacity-30"></div>
    @endif
    <div class="relative">
        {{ $slot }}
    </div>
</div>

@pushOnce('styles')
<style>
    .card-header {
        @apply px-6 py-4 border-b border-base-200/50;
    }

    .card-title {
        @apply text-lg font-semibold;
    }

    .card-body {
        @apply p-6;
    }

    .card-footer {
        @apply px-6 py-4 border-t border-base-200/50;
    }
</style>
@endPushOnce 