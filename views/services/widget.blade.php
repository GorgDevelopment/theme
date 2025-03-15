<div class="space-y-4">
    @foreach ($services as $service)
    <a href="{{ route('services.show', $service) }}" wire:navigate class="block">
        <div class="bg-background hover:bg-background/80 border border-neutral/50 p-5 rounded-xl transition-all hover:shadow-sm group">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="bg-primary/10 p-2.5 rounded-lg group-hover:bg-primary/20 transition-colors">
                        <x-ri-instance-line class="size-5 text-primary" />
                    </div>
                    <span class="font-medium text-base group-hover:text-primary transition-colors">{{ $service->product->name }}</span>
                </div>
                <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium
                    @if ($service->status == 'active') bg-success/10 text-success
                    @elseif($service->status == 'suspended') bg-inactive/10 text-inactive
                    @else bg-warning/10 text-warning
                    @endif">
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
                <div class="flex items-center gap-2 text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ $service->product->category->name }}</span>
                    <span class="text-base/50">•</span>
                    <span>{{ __('Renewal') }}: {{ $service->plan->billing_period > 1 ? $service->plan->billing_period : '' }}
                    {{ Str::plural($service->plan->billing_unit, $service->plan->billing_period) }}</span>
                </div>
                @if($service->expires_at)
                <div class="flex items-center gap-2 text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ __('Expires') }}:</span>
                    <span>{{ $service->expires_at->format('d M Y') }}</span>
                </div>
                @endif
            </div>
        </div>
    </a>
    @endforeach
</div>
