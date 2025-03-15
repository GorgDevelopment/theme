@props(['name', 'label', 'id' => null, 'divClass' => null])

<div class="flex items-center {{ $divClass ?? '' }}">
    {{-- <input type="hidden" name="{{ $name }}" value="0" /> --}}
    <input 
        type="checkbox" 
        name="{{ $name }}" 
        id="{{ $id ?? $name }}"
        {{ $attributes->only(['wire:model', 'checked', 'wire:dirty.class']) }}
        class="form-checkbox size-5 text-primary bg-background/50 border-neutral/30 rounded-md
        focus:ring-2 focus:ring-primary/20 focus:border-primary/30 
        hover:bg-background/80 hover:border-primary/50
        ring-offset-2 ring-offset-background
        transition-all duration-200 ease-in-out"
    />
    <label class="ml-3 text-sm font-medium text-base/70 select-none cursor-pointer" for="{{ $id ?? $name }}">
        {{ $label }}
    </label>

    @error($name)
        <p class="mt-2 text-sm text-error/80">{{ $message }}</p>
    @enderror
</div>
