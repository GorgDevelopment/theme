<div class="space-y-4">
    @foreach ($invoices as $invoice)
    <a href="{{ route('invoices.show', $invoice) }}" wire:navigate class="block">
        <div class="bg-background hover:bg-background/80 border border-neutral/50 p-5 rounded-xl transition-all hover:shadow-sm group">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="bg-warning/10 p-2.5 rounded-lg group-hover:bg-warning/20 transition-colors">
                        <x-ri-bill-line class="size-5 text-warning" />
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-base group-hover:text-warning transition-colors">{{ __('Invoice') }} #{{$invoice->id }}</span>
                        <span class="text-base/50">•</span>
                        <span class="text-sm font-medium">{{ $invoice->formattedTotal }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium
                    @if ($invoice->status == 'paid') bg-success/10 text-success
                    @elseif($invoice->status == 'cancelled') bg-info/10 text-info
                    @else bg-warning/10 text-warning
                    @endif">
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
            <div class="flex flex-col gap-2">
                @foreach ($invoice->items as $item)
                <div class="flex items-center gap-2 text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ $item->description }}</span>
                    <span class="text-base/50">•</span>
                    <span>{{ __('invoices.invoice_date') }}: {{ $invoice->created_at->format('d M Y') }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </a>
    @endforeach
</div>