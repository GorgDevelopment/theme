<div class="space-y-4">
    @foreach ($services as $service)
    <a href="{{ route('services.show', $service) }}" wire:navigate class="block">
        <div class="bg-background-secondary hover:bg-background-secondary/80 border border-neutral p-5 rounded-lg transition-all hover:shadow-sm group">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="bg-primary/10 p-2.5 rounded-lg group-hover:bg-primary/20 transition-colors">
                        <x-ri-instance-line class="size-5 text-primary" />
                    </div>
                    <span class="font-semibold text-base group-hover:text-primary transition-colors">{{ $service->product->name }}</span>
                </div>
                <div class="
                    @if ($service->status == 'active') text-success bg-success/10 
                    @elseif($service->status == 'suspended') text-inactive bg-inactive/10
                    @else text-warning bg-warning/10 
                    @endif
                    flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium">
                    @if ($service->status == 'active')
                        <x-ri-checkbox-circle-fill class="size-4" />
                        <span>{{ __('Active') }}</span>
                    @elseif($service->status == 'suspended')
                        <x-ri-forbid-fill class="size-4" />
                        <span>{{ __('Suspended') }}</span>
                    @elseif($service->status == 'pending')
                        <x-ri-error-warning-fill class="size-4" />
                        <span>{{ __('Pending') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                <p class="text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ $service->product->category->name }}</span> — 
                    {{ __('Renewal') }}: {{ $service->plan->billing_period > 1 ? $service->plan->billing_period : '' }}
                    {{ Str::plural($service->plan->billing_unit, $service->plan->billing_period) }}
                </p>
                @if($service->expires_at)
                <p class="text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ __('Expires') }}:</span> {{ $service->expires_at->format('d M Y') }}
                </p>
                @endif
            </div>
        </div>
    </a>
    @endforeach
</div>
