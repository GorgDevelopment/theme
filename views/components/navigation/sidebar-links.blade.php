<!-- Sidebar Navigation -->
<div class="flex flex-col gap-6 p-4">
    <!-- Main Navigation (Mobile Only) -->
    <div class="block md:hidden">
        <div class="space-y-2">
            @php
            $navigation = [
                [
                    'name' => 'Dashboard',
                    'icon' => 'ri-dashboard-line',
                    'route' => 'dashboard',
                    'active' => request()->routeIs('dashboard'),
                ],
                [
                    'name' => 'Services',
                    'icon' => 'ri-server-line',
                    'route' => 'services',
                    'active' => request()->routeIs('services*'),
                ],
                [
                    'name' => 'Tickets',
                    'icon' => 'ri-customer-service-line',
                    'route' => 'tickets',
                    'active' => request()->routeIs('tickets*'),
                ],
                [
                    'name' => 'Invoices',
                    'icon' => 'ri-bill-line',
                    'route' => 'invoices',
                    'active' => request()->routeIs('invoices*'),
                ],
                [
                    'name' => 'Settings',
                    'icon' => 'ri-settings-line',
                    'route' => 'settings',
                    'active' => request()->routeIs('settings*'),
                ],
            ];
            @endphp

            @foreach ($navigation as $item)
                <a 
                    href="{{ route($item['route']) }}" 
                    class="group flex items-center gap-3 px-4 py-2.5 rounded-xl {{ $item['active'] ? 'bg-primary/10 text-primary' : 'text-base-content hover:bg-base-200' }} transition-colors"
                >
                    <i class="{{ $item['icon'] }} text-xl {{ $item['active'] ? 'text-primary' : 'text-base-content/70 group-hover:text-base-content' }} transition-colors"></i>
                    <span class="font-medium">{{ $item['name'] }}</span>
                </a>
            @endforeach
        </div>

        <!-- Language and Theme Switcher -->
        <div class="flex items-center justify-between mt-6 px-4">
            <x-dropdown width="48">
                <x-slot:trigger>
                    <button class="flex items-center gap-2 text-sm font-medium text-base/70 hover:text-base transition-colors">
                        <span>{{ strtoupper(app()->getLocale()) }}</span>
                        <span class="text-base/30">|</span>
                        <span>{{ session('currency', 'USD') }}</span>
                    </button>
                </x-slot:trigger>

                <x-slot:content>
                    <div class="px-3 py-2 text-xs font-medium text-base/50 uppercase">
                        Language
                    </div>
                    <livewire:components.language-switch />
                    <livewire:components.currency-switch />
                </x-slot:content>
            </x-dropdown>

            <x-theme-toggle />
        </div>
    </div>

    <!-- Dashboard Navigation -->
    <div class="space-y-2">
        @foreach (\App\Classes\Navigation::getDashboardLinks() as $nav)
            @if (!empty($nav['children']))
                <!-- Dropdown Menu -->
                <div x-data="{ open: {{ $nav['active'] ? 'true' : 'false' }} }" class="relative">
                    <button 
                        @click="open = !open"
                        class="flex items-center justify-between w-full px-4 py-2.5 text-sm font-medium rounded-xl transition-colors {{ $nav['active'] ? 'text-primary bg-primary/10' : 'text-base/70 hover:text-base hover:bg-neutral/10' }}"
                    >
                        <div class="flex items-center gap-3">
                            @isset($nav['icon'])
                                <x-dynamic-component 
                                    :component="$nav['icon']"
                                    class="size-5 {{ $nav['active'] ? 'text-primary' : 'text-base/50' }}" 
                                />
                            @endisset
                            <span>{{ $nav['name'] }}</span>
                        </div>
                        <x-ri-arrow-down-s-line 
                            x-bind:class="{ 'rotate-180': open }"
                            class="size-4 transition-transform duration-200" 
                        />
                    </button>

                    <!-- Dropdown Content -->
                    <div 
                        x-show="open" 
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="mt-1 ml-4 space-y-1"
                    >
                        @foreach ($nav['children'] as $child)
                            <x-navigation.link 
                                :href="route($child['route'], $child['params'] ?? [])"
                                :spa="$child['spa'] ?? true"
                                class="px-4 py-2 rounded-lg {{ $child['active'] ? 'text-primary bg-primary/10' : 'text-base/70' }}"
                            >
                                {{ $child['name'] }}
                            </x-navigation.link>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Single Link -->
                <x-navigation.link 
                    :href="route($nav['route'], $nav['params'] ?? [])"
                    :spa="$nav['spa'] ?? true"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ $nav['active'] ? 'text-primary bg-primary/10' : 'text-base/70' }}"
                >
                    @isset($nav['icon'])
                        <x-dynamic-component 
                            :component="$nav['icon']"
                            class="size-5 {{ $nav['active'] ? 'text-primary' : 'text-base/50' }}" 
                        />
                    @endisset
                    {{ $nav['name'] }}
                </x-navigation.link>
            @endif

            @isset($nav['separator'])
                <div class="my-4 border-t border-neutral/10"></div>
            @endisset
        @endforeach
    </div>
</div>