<div class="min-h-screen">
    <x-navigation.breadcrumb class="mb-4" />
    <div class="bg-background-secondary/50 border border-neutral rounded-xl p-6 mb-8">
        <h1 class="text-2xl font-bold mb-2">{{ __('dashboard.welcome') }}</h1>
        <p class="text-base/70">
            {{ __('dashboard.dashboard_description') }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8 items-start">
        <div class="grid gap-8 items-start">
            <!-- Active Services -->
            <div class="bg-background border border-neutral rounded-xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-primary/10 border border-primary/20 p-3 rounded-xl">
                            <x-ri-archive-stack-fill class="size-6 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">{{ __('dashboard.active_services') }}</h2>
                    </div>
                    <span class="bg-primary text-white flex items-center justify-center font-semibold rounded-lg px-3 py-1 min-w-8 text-sm">
                        {{ Auth::user()->services()->where('status', 'active')->count() }}
                    </span>
                </div>
                <div class="space-y-4">
                    <livewire:services.widget status="active" />
                </div>
                <x-navigation.link class="mt-4 bg-background-secondary hover:bg-background-secondary/80 border border-neutral flex items-center justify-center gap-2 p-3 rounded-lg font-medium transition-colors"
                    :href="route('services')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>

            <!-- Open Tickets -->
            <div class="bg-background border border-neutral rounded-xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-secondary/10 border border-secondary/20 p-3 rounded-xl">
                            <x-ri-customer-service-fill class="size-6 text-secondary" />
                        </div>
                        <h2 class="text-xl font-bold">{{ __('dashboard.open_tickets') }}</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('tickets.create') }}" wire:navigate class="bg-primary/10 hover:bg-primary/20 text-primary p-2 rounded-lg transition-colors">
                            <x-ri-add-fill class="size-5" />
                        </a>
                        <span class="bg-primary text-white flex items-center justify-center font-semibold rounded-lg px-3 py-1 min-w-8 text-sm">
                            {{ Auth::user()->tickets()->where('status', '!=', 'closed')->count() }}
                        </span>
                    </div>
                </div>
                <div class="space-y-4">
                    <livewire:tickets.widget />
                </div>
                <x-navigation.link class="mt-4 bg-background-secondary hover:bg-background-secondary/80 border border-neutral flex items-center justify-center gap-2 p-3 rounded-lg font-medium transition-colors"
                    :href="route('tickets')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>
        </div>

        <div class="grid gap-8 items-start">
            <!-- Unpaid Invoices -->
            <div class="bg-background border border-neutral rounded-xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-warning/10 border border-warning/20 p-3 rounded-xl">
                            <x-ri-receipt-fill class="size-6 text-warning" />
                        </div>
                        <h2 class="text-xl font-bold">{{ __('dashboard.unpaid_invoices') }}</h2>
                    </div>
                    <span class="bg-primary text-white flex items-center justify-center font-semibold rounded-lg px-3 py-1 min-w-8 text-sm">
                        {{ Auth::user()->invoices()->where('status', 'pending')->count() }}
                    </span>
                </div>
                <div class="space-y-4">
                    <livewire:invoices.widget :limit="3" />
                </div>
                <x-navigation.link class="mt-4 bg-background-secondary hover:bg-background-secondary/80 border border-neutral flex items-center justify-center gap-2 p-3 rounded-lg font-medium transition-colors"
                    :href="route('invoices')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>
            {!! hook('pages.dashboard') !!}
        </div>
    </div>
</div>