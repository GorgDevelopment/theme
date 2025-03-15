@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary/10 text-primary font-medium transition-colors'
    : 'inline-flex items-center gap-2 px-4 py-2 rounded-xl text-base-content hover:bg-base-200 transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> 