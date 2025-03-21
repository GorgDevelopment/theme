@props([
    'label' => null,
    'error' => null,
    'disabled' => false,
    'helper' => null,
])

<div class="relative">
    @if($label)
        <label class="block text-sm font-medium text-base-content/70 mb-1.5">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <select 
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes->merge([
                'class' => 'w-full rounded-xl bg-base-200/50 border border-base-300 px-4 py-2.5 text-base-content
                          appearance-none
                          focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary
                          disabled:opacity-60 disabled:cursor-not-allowed
                          ' . ($error ? 'border-error focus:ring-error/20 focus:border-error' : '')
            ]) }}
        >
            {{ $slot }}
        </select>

        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg class="size-5 text-base-content/50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </div>
    </div>

    @if($error)
        <p class="mt-1.5 text-sm text-error">{{ $error }}</p>
    @endif

    @if($helper)
        <p class="mt-1.5 text-sm text-base-content/70">{{ $helper }}</p>
    @endif
</div>