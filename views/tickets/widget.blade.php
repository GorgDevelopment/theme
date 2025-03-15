<div class="space-y-4">
    @foreach ($tickets as $ticket)
    <a href="{{ route('tickets.show', $ticket) }}" wire:navigate class="block">
        <div class="bg-background-secondary hover:bg-background-secondary/80 border border-neutral p-5 rounded-lg transition-all hover:shadow-sm group">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="bg-secondary/10 p-2.5 rounded-lg group-hover:bg-secondary/20 transition-colors">
                        <x-ri-ticket-line class="size-5 text-secondary" />
                    </div>
                    <span class="font-semibold text-base group-hover:text-secondary transition-colors">{{ $ticket->subject }}</span>
                </div>
                <div class="
                    @if ($ticket->status == 'open') text-success bg-success/10 
                    @elseif($ticket->status == 'closed') text-inactive bg-inactive/10
                    @else text-info bg-info/10 
                    @endif
                    flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium">
                    @if ($ticket->status == 'open')
                        <x-ri-add-circle-fill class="size-4" />
                        <span>{{ __('Open') }}</span>
                    @elseif($ticket->status == 'closed')
                        <x-ri-forbid-fill class="size-4" />
                        <span>{{ __('Closed') }}</span>
                    @elseif($ticket->status == 'replied')
                        <x-ri-chat-smile-2-fill class="size-4" />
                        <span>{{ __('Replied') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                <p class="text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ __('ticket.last_activity') }}:</span>
                    {{ $ticket->messages()->orderBy('created_at', 'desc')->first()->created_at->diffForHumans() }}
                </p>
                @if($ticket->department)
                <p class="text-sm text-base/70">
                    <span class="font-medium text-base/80">{{ __('Department') }}:</span> 
                    {{ $ticket->department }}
                </p>
                @endif
            </div>
        </div>
    </a>
    @endforeach
</div>
