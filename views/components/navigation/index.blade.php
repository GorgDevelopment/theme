<!-- Navigation Header -->
<nav class="fixed top-0 inset-x-0 z-20 w-full">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-background/80 backdrop-blur-xl border-b border-neutral/10"></div>

    <!-- Content -->
    <div class="relative mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Left side -->
            <div class="flex items-center gap-6">
                <!-- Mobile menu button -->
                <button 
                    @click="slideOverOpen=true" 
                    class="flex md:hidden items-center justify-center size-10 rounded-xl hover:bg-neutral/10 transition-colors"
                >
                    <x-ri-menu-fill class="size-5" />
                </button>

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group" wire:navigate>
                    <x-logo class="h-8 transition-transform group-hover:scale-110" />
                    <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                        {{ config('app.name') }}
                    </span>
                </a>
            </div>

            <!-- Right side -->
            <div class="flex items-center gap-4">
                @if (Auth::check())
                    <!-- User dropdown -->
                    <x-dropdown>
                        <x-slot:trigger>
                            <button class="flex items-center gap-3 p-1.5 rounded-xl hover:bg-neutral/10 transition-colors">
                                <img 
                                    src="{{ auth()->user()->avatar }}" 
                                    class="size-8 rounded-lg border border-neutral/20 bg-background object-cover" 
                                    alt="{{ auth()->user()->name }}" 
                                />
                                <x-ri-arrow-down-s-line class="size-4 text-base/70" />
                            </button>
                        </x-slot:trigger>

                        <x-slot:content>
                            <!-- User info -->
                            <div class="p-3 border-b border-neutral/10">
                                <span class="block font-medium">{{ auth()->user()->name }}</span>
                                <span class="block text-sm text-base/70">{{ auth()->user()->email }}</span>
                            </div>

                            <!-- Navigation links -->
                            @foreach (\App\Classes\Navigation::getAccountDropdownLinks() as $nav)
                                <x-navigation.link 
                                    :href="route($nav['route'], $nav['params'] ?? null)" 
                                    :spa="isset($nav['spa']) ? $nav['spa'] : true"
                                    class="flex items-center gap-2 px-3 py-2 text-sm hover:bg-neutral/10 transition-colors"
                                >
                                    {{ $nav['name'] }}
                                </x-navigation.link>
                            @endforeach

                            <!-- Logout -->
                            <livewire:auth.logout />
                        </x-slot:content>
                    </x-dropdown>
                @else
                    <!-- Auth buttons -->
                    <div class="flex items-center gap-3">
                        <x-navigation.link 
                            :href="route('login')" 
                            class="px-4 py-2 text-sm font-medium rounded-xl hover:bg-neutral/10 transition-colors"
                        >
                            {{ __('navigation.login') }}
                        </x-navigation.link>
                        <x-navigation.link 
                            :href="route('register')" 
                            class="px-4 py-2 text-sm font-medium bg-primary text-white rounded-xl hover:bg-primary/90 transition-colors"
                        >
                            {{ __('navigation.register') }}
                        </x-navigation.link>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-data="{ slideOverOpen: false }" x-init="$watch('slideOverOpen', value => { document.documentElement.style.overflow = value ? 'hidden' : '' })" class="relative z-50">
        <template x-teleport="body">
            <!-- Backdrop -->
            <div 
                x-show="slideOverOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/30 backdrop-blur-sm"
                @click="slideOverOpen = false"
            ></div>

            <!-- Panel -->
            <div class="fixed inset-y-0 left-0 w-full max-w-xs">
                <div 
                    x-show="slideOverOpen"
                    x-transition:enter="transform transition ease-in-out duration-300"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full"
                    class="relative w-full h-full glass-light dark:glass-dark shadow-xl"
                    @click.away="slideOverOpen = false"
                >
                    <!-- Close button -->
                    <div class="absolute right-4 top-4">
                        <button 
                            @click="slideOverOpen = false"
                            class="inline-flex items-center justify-center size-8 text-base/70 hover:text-base rounded-lg hover:bg-neutral/10 transition-colors"
                        >
                            <x-ri-close-fill class="size-5" />
                        </button>
                    </div>

                    <!-- Content -->
                    <div class="h-full overflow-y-auto">
                        <!-- Logo -->
                        <div class="flex items-center gap-3 p-6">
                            <x-logo class="h-8" />
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                                {{ config('app.name') }}
                            </span>
                        </div>

                        <!-- Navigation -->
                        <div class="px-3 py-4">
                            <x-navigation.sidebar-links />
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</nav>
