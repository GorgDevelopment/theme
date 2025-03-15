@props(['variant' => 'default'])

@php
$variants = [
    'default' => [
        'gradient' => 'from-primary via-secondary to-accent',
        'shadow' => 'shadow-primary/20',
    ],
    'light' => [
        'gradient' => 'from-white/80 via-white/50 to-white/80',
        'shadow' => 'shadow-white/20',
    ],
    'dark' => [
        'gradient' => 'from-base-content/80 via-base-content/50 to-base-content/80',
        'shadow' => 'shadow-base-content/20',
    ],
];
@endphp

<div {{ $attributes->merge(['class' => 'relative flex items-center justify-center']) }}>
    <!-- Glow Effect -->
    <div class="absolute inset-0 bg-gradient-to-br {{ $variants[$variant]['gradient'] }} opacity-20 blur-xl rounded-full"></div>

    <!-- Logo Shape -->
    <div class="relative size-8 bg-gradient-to-br {{ $variants[$variant]['gradient'] }} rounded-xl {{ $variants[$variant]['shadow'] }}"></div>
</div>
