@props(['type' => 'button'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium bg-background/50 backdrop-blur-sm border border-neutral/30 text-base rounded-xl shadow-sm hover:bg-background/80 hover:border-neutral/50 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:ring-offset-2 focus:ring-offset-background disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 ease-in-out']) }}>
    {{ $slot }}
</button>