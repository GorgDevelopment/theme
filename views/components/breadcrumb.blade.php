@props(['items'])

<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center gap-2">
        <li>
            <div>
                <a href="{{ route('dashboard') }}" class="text-base-content/70 hover:text-base-content transition-colors">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>

        @foreach ($items as $item)
            <li>
                <div class="flex items-center">
                    <svg class="size-5 text-base-content/30" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    @if (isset($item['url']))
                        <a href="{{ $item['url'] }}" class="ml-2 text-sm font-medium text-base-content/70 hover:text-base-content transition-colors">
                            {{ $item['title'] }}
                        </a>
                    @else
                        <span class="ml-2 text-sm font-medium text-base-content">
                            {{ $item['title'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav> 