@props(['type' => 'button'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium bg-success/10 text-success rounded-xl shadow-sm hover:bg-success/20 focus:outline-none focus:ring-2 focus:ring-success/20 focus:ring-offset-2 focus:ring-offset-background disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 ease-in-out']) }}>
    {{ $slot }}
</button>

<!-- Show saved! when the form is saved -->
<div class="flex flex-row items-center">
    <x-button.primary {{ $attributes }}>
        {{ $slot }}
    </x-button.primary>

    <div class="flex items-center justify-center ml-2 text-green-500 hidden opacity-0 transition-opacity ease-in-out delay-150 duration-300 mt-4" id="saved">
        {{ __('Saved!') }}
    </div>
    @script
        <script>
            $wire.on('saved', function () {
                setTimeout(() => {
                    document.getElementById('saved').classList.remove('hidden');
                }, 50);
                setTimeout(() => {
                    document.getElementById('saved').classList.remove('opacity-0');
                    document.getElementById('saved').classList.add('opacity-100');
                }, 70);
                setTimeout(() => {
                    document.getElementById('saved').classList.remove('opacity-100');
                    document.getElementById('saved').classList.add('opacity-0');
                }, 2500);
            });
        </script>
    @endscript
</div>
