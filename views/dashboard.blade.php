<div class="min-h-screen">
    <x-navigation.breadcrumb class="mb-6" />
    
    <div class="bg-gradient-to-br from-primary/10 via-secondary/10 to-background border border-neutral/50 rounded-2xl p-8 mb-8">
        <h1 class="text-3xl font-bold mb-3 bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
            {{ __('dashboard.welcome') }}
        </h1>
        <p class="text-base/70 max-w-2xl">
            {{ __('dashboard.dashboard_description') }}
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
        <div class="grid gap-6 items-start">
            <!-- Active Services -->
            <div class="bg-background/50 backdrop-blur-sm border border-neutral/50 rounded-2xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-primary/10 border border-primary/20 p-3 rounded-xl">
                            <x-ri-archive-stack-fill class="size-6 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-primary/80">
                            {{ __('dashboard.active_services') }}
                        </h2>
                    </div>
                    <span class="bg-primary/10 text-primary flex items-center justify-center font-medium rounded-lg px-3 py-1.5 min-w-8 text-sm">
                        {{ Auth::user()->services()->where('status', 'active')->count() }}
                    </span>
                </div>
                <div class="space-y-4">
                    <livewire:services.widget status="active" />
                </div>
                <x-navigation.link class="mt-4 bg-background hover:bg-background/80 border border-neutral/50 flex items-center justify-center gap-2 p-3 rounded-xl font-medium transition-colors"
                    :href="route('services')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>

            <!-- Open Tickets -->
            <div class="bg-background/50 backdrop-blur-sm border border-neutral/50 rounded-2xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-secondary/10 border border-secondary/20 p-3 rounded-xl">
                            <x-ri-customer-service-fill class="size-6 text-secondary" />
                        </div>
                        <h2 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-secondary to-secondary/80">
                            {{ __('dashboard.open_tickets') }}
                        </h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('tickets.create') }}" wire:navigate class="bg-secondary/10 hover:bg-secondary/20 text-secondary p-2 rounded-lg transition-colors">
                            <x-ri-add-fill class="size-5" />
                        </a>
                        <span class="bg-secondary/10 text-secondary flex items-center justify-center font-medium rounded-lg px-3 py-1.5 min-w-8 text-sm">
                            {{ Auth::user()->tickets()->where('status', '!=', 'closed')->count() }}
                        </span>
                    </div>
                </div>
                <div class="space-y-4">
                    <livewire:tickets.widget />
                </div>
                <x-navigation.link class="mt-4 bg-background hover:bg-background/80 border border-neutral/50 flex items-center justify-center gap-2 p-3 rounded-xl font-medium transition-colors"
                    :href="route('tickets')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>
        </div>

        <div class="grid gap-6 items-start">
            <!-- Unpaid Invoices -->
            <div class="bg-background/50 backdrop-blur-sm border border-neutral/50 rounded-2xl p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-warning/10 border border-warning/20 p-3 rounded-xl">
                            <x-ri-receipt-fill class="size-6 text-warning" />
                        </div>
                        <h2 class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-warning to-warning/80">
                            {{ __('dashboard.unpaid_invoices') }}
                        </h2>
                    </div>
                    <span class="bg-warning/10 text-warning flex items-center justify-center font-medium rounded-lg px-3 py-1.5 min-w-8 text-sm">
                        {{ Auth::user()->invoices()->where('status', 'pending')->count() }}
                    </span>
                </div>
                <div class="space-y-4">
                    <livewire:invoices.widget :limit="3" />
                </div>
                <x-navigation.link class="mt-4 bg-background hover:bg-background/80 border border-neutral/50 flex items-center justify-center gap-2 p-3 rounded-xl font-medium transition-colors"
                    :href="route('invoices')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>
            {!! hook('pages.dashboard') !!}
        </div>
    </div>
</div>