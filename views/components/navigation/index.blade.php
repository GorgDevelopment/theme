<nav class="w-full md:px-4 bg-background-secondary/95 backdrop-blur-sm border-b border-neutral/50 md:h-16 flex md:flex-row flex-col justify-between fixed top-0 z-20">
    <div x-data="{ 
        slideOverOpen: false 
    }"
        x-init="$watch('slideOverOpen', value => { document.documentElement.style.overflow = value ? 'hidden' : '' })"
        class="relative z-50 w-full h-auto">

        <div class="flex flex-row items-center justify-between h-16 px-4">
            <div class="flex flex-row items-center gap-6">
                <button @click="slideOverOpen=true" class="flex md:hidden w-10 h-10 items-center justify-center rounded-lg hover:bg-neutral/30 transition">
                    <x-ri-menu-fill class="size-5" />
                </button>
                <a href="{{ route('home') }}" class="flex flex-row items-center gap-3" wire:navigate>
                    <x-logo class="h-8" />
                    <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ config('app.name') }}</span>
                </a>
                <div class="md:flex hidden flex-row items-center gap-2">
                    @foreach (\App\Classes\Navigation::getLinks() as $nav)
                    @if (isset($nav['children']) && count($nav['children']) > 0)
                    <div class="relative">
                        <x-dropdown>
                            <x-slot:trigger>
                                <div class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-neutral/30 transition-colors">
                                    <span class="text-sm font-medium">{{ $nav['name'] }}</span>
                                    <x-ri-arrow-down-s-line class="size-4" />
                                </div>
                            </x-slot:trigger>
                            <x-slot:content>
                                @foreach ($nav['children'] as $child)
                                <x-navigation.link
                                    :href="route($child['route'], $child['params'] ?? null)"
                                    :spa="isset($child['spa']) ? $nav['spa'] : true">
                                    {{ $child['name'] }}
                                </x-navigation.link>
                                @endforeach
                            </x-slot:content>
                        </x-dropdown>
                    </div>
                    @else
                    <x-navigation.link
                        :href="route($nav['route'], $nav['params'] ?? null)"
                        :spa="isset($nav['spa']) ? $nav['spa'] : true"
                        class="px-3 py-2 rounded-lg hover:bg-neutral/30 transition-colors">
                        {{ $nav['name'] }}
                    </x-navigation.link>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="flex flex-row items-center gap-3">
                <a href="https://status.cirrixo.com/" target="_blank" 
                    class="hidden md:inline-flex items-center gap-2 px-3 py-2 bg-success/10 hover:bg-success/20 text-success rounded-lg transition-colors">
                    <x-ri-pulse-line class="size-4" />
                    <span class="text-sm font-medium">Status</span>
                </a>

                <div class="items-center hidden md:flex">
                    <x-dropdown>
                        <x-slot:trigger>
                            <div class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-neutral/30 transition-colors">
                                <span class="text-sm font-medium">{{ strtoupper(app()->getLocale()) }} | {{ session('currency', 'USD') }}</span>
                                <x-ri-arrow-down-s-line class="size-4" />
                            </div>
                        </x-slot:trigger>
                        <x-slot:content>
                            <strong class="block p-2 text-xs font-semibold uppercase text-base/50">Language</strong>
                            <livewire:components.language-switch />
                            <livewire:components.currency-switch />
                        </x-slot:content>
                    </x-dropdown>
                
                    <x-theme-toggle />
                </div>

                <livewire:components.cart />

                @if(auth()->check())
                <x-dropdown>
                    <x-slot:trigger>
                        <div class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-neutral/30 transition-colors">
                            <img src="{{ auth()->user()->avatar }}" class="size-8 rounded-full border border-neutral/50 bg-background" alt="avatar" />
                            <x-ri-arrow-down-s-line class="size-4" />
                        </div>
                    </x-slot:trigger>
                    <x-slot:content>
                        <div class="flex flex-col p-3 border-b border-neutral">
                            <span class="font-medium">{{ auth()->user()->name }}</span>
                            <span class="text-sm text-base/70">{{ auth()->user()->email }}</span>
                        </div>
                        @foreach (\App\Classes\Navigation::getAccountDropdownLinks() as $nav)
                        <x-navigation.link :href="route($nav['route'], $nav['params'] ?? null)" :spa="isset($nav['spa']) ? $nav['spa'] : true">
                            {{ $nav['name'] }}
                        </x-navigation.link>
                        @endforeach
                        <livewire:auth.logout />
                    </x-slot:content>
                </x-dropdown>
                @else
                <div class="flex items-center gap-2">
                    <x-navigation.link :href="route('login')" class="px-3 py-2 rounded-lg hover:bg-neutral/30 transition-colors">
                        {{ __('navigation.login') }}
                    </x-navigation.link>
                    <x-navigation.link :href="route('register')" class="px-3 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg transition-colors">
                        {{ __('navigation.register') }}
                    </x-navigation.link>
                </div>
                @endif
            </div>
        </div>

        <!-- Mobile Menu -->
        <template x-teleport="body">
            <div
                x-show="slideOverOpen"
                @keydown.window.escape="slideOverOpen=false"
                class="relative z-[99]">
                <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false" class="fixed inset-0 bg-black/20 backdrop-blur-sm"></div>
                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="fixed inset-y-0 left-0 flex max-w-full pr-44">
                            <div
                                x-show="slideOverOpen"
                                @click.away="slideOverOpen = false"
                                x-transition:enter="transform transition ease-in-out duration-500"
                                x-transition:enter-start="-translate-x-full"
                                x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500"
                                x-transition:leave-start="translate-x-0"
                                x-transition:leave-end="-translate-x-full"
                                class="w-screen max-w-full">
                                <div class="flex flex-col h-full bg-background-secondary border-r border-neutral shadow-lg">
                                    <div class="flex items-center justify-between h-16 px-4">
                                        <a href="{{ route('home') }}" class="flex items-center gap-3" wire:navigate>
                                            <x-logo class="h-8" />
                                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ config('app.name') }}</span>
                                        </a>
                                        <button @click="slideOverOpen=false" class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-neutral/30 transition">
                                            <x-ri-close-fill class="size-5" />
                                        </button>
                                    </div>
                                    <div class="flex-1 overflow-y-auto px-4 py-6">
                                        <div class="flex flex-col gap-2">
                                            <a href="https://status.cirrixo.com/" target="_blank" 
                                                class="inline-flex items-center gap-2 px-3 py-2 bg-success/10 hover:bg-success/20 text-success rounded-lg transition-colors">
                                                <x-ri-pulse-line class="size-4" />
                                                <span class="text-sm font-medium">Status</span>
                                            </a>
                                            <x-navigation.sidebar-links />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</nav>
