@props(['href', 'spa' => true])

<a 
    href="{{ $href }}" 
    {{ $attributes->merge([
        'class' => 'inline-flex items-center gap-2 text-sm font-medium transition-colors ' . 
        ($href === request()->url() 
            ? 'text-primary bg-primary/10 hover:bg-primary/20' 
            : 'text-base/80 hover:text-base hover:bg-neutral/10'
        )
    ]) }} 
    @if($spa) wire:navigate @endif
>
    {{ $slot }}
</a>