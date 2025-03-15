<div class="space-y-4">
    @foreach ($invoices as $invoice)
    <a href="{{ route('invoices.show', $invoice) }}" wire:navigate class="block">
        <div class="bg-background-secondary hover:bg-background-secondary/80 border border-neutral p-5 rounded-lg transition-all hover:shadow-sm group">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="bg-warning/10 p-2.5 rounded-lg group-hover:bg-warning/20 transition-colors">
                        <x-ri-bill-line class="size-5 text-warning" />
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-base group-hover:text-warning transition-colors">{{ __('Invoice') }} #{{$invoice->id }}</span>
                        <span class="text-base/50">•</span>
                        <span class="text-sm font-medium">{{ $invoice->formattedTotal }}</span>
                    </div>
                </div>
                <div class="
                    @if ($invoice->status == 'paid') text-success bg-success/10 
                    @elseif($invoice->status == 'cancelled') text-info bg-info/10
                    @else text-warning bg-warning/10 
                    @endif
                    flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium">
                    @if ($invoice->status == 'paid')
                        <x-ri-checkbox-circle-fill class="size-4" />
                        <span>{{ __('Paid') }}</span>
                    @elseif($invoice->status == 'cancelled')
                        <x-ri-forbid-fill class="size-4" />
                        <span>{{ __('Cancelled') }}</span>
                    @elseif($invoice->status == 'pending')
                        <x-ri-error-warning-fill class="size-4" />
                        <span>{{ __('Pending') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-1">
                @foreach ($invoice->items as $item)
                <p class="text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ $item->description }}</span>
                    <span class="text-base/50">•</span>
                    <span>{{ __('invoices.invoice_date') }}: {{ $invoice->created_at->format('d M Y') }}</span>
                </p>
                @endforeach
            </div>
        </div>
    </a>
    @endforeach
</div>