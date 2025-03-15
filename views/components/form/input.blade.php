@props(['name', 'label' => null, 'required' => false, 'divClass' => null, 'class' => null,'placeholder' => null, 'id' => null, 'type' => null, 'hideRequiredIndicator' => false, 'dirty' => false])

<fieldset class="flex flex-col relative mt-3 w-full {{ $divClass ?? '' }}">
    @if ($label)
        <legend>
            <label for="{{ $name }}" class="text-sm font-medium text-base/70 absolute -translate-y-1/2 start-3 px-2 bg-background/50 backdrop-blur-sm rounded">
                {{ $label }}
                @if ($required && !$hideRequiredIndicator)
                    <span class="text-error/80">*</span>
                @endif
            </label>
        </legend>
    @endif
    
    <input 
        type="{{ $type ?? 'text' }}" 
        id="{{ $id ?? $name }}" 
        name="{{ $name }}"
        class="block w-full text-sm text-base bg-background/50 backdrop-blur-sm border border-neutral/30 rounded-xl shadow-sm px-4 py-3
        placeholder:text-base/50
        focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary/30
        disabled:bg-neutral/10 disabled:cursor-not-allowed disabled:placeholder:text-base/30
        transition-all duration-200 ease-in-out
        {{ $class ?? '' }} 
        @if ($type === 'color') !p-1 @endif"
        placeholder="{{ $placeholder ?? ($label ?? '') }}"
        @if ($dirty && isset($attributes['wire:model'])) 
            wire:dirty.class="!ring-2 !ring-warning/20 !border-warning/30"
        @endif
        {{ $attributes->except(['placeholder', 'label', 'id', 'name', 'type', 'class', 'divClass', 'required', 'hideRequiredIndicator', 'dirty']) }} 
        @required($required)
    />
    
    @error($name)
        <p class="mt-2 text-sm text-error/80">{{ $message }}</p>
    @enderror
</fieldset>
