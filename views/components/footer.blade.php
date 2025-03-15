@props(['container' => true])

<footer class="relative mt-auto">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-base-200/50 backdrop-blur-sm"></div>

    <!-- Content -->
    <div class="{{ $container ? 'container mx-auto' : '' }} relative px-4 py-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
            <!-- Logo and Copyright -->
            <div class="flex flex-col items-center md:items-start gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group" wire:navigate>
                    <x-logo class="h-8 transition-transform group-hover:scale-110" />
                    <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                        {{ config('app.name') }}
                    </span>
                </a>
                <div class="text-sm text-base-content/70">
                    {{ __('© :year :app_name. All rights reserved.', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
                </div>
            </div>

            <!-- Links -->
            <div class="flex flex-wrap items-center gap-6">
                <!-- Navigation -->
                <nav class="flex items-center gap-6">
                    <a href="{{ route('about') }}" class="text-sm text-base-content/70 hover:text-base-content transition-colors">
                        About
                    </a>
                    <a href="{{ route('privacy') }}" class="text-sm text-base-content/70 hover:text-base-content transition-colors">
                        Privacy
                    </a>
                    <a href="{{ route('terms') }}" class="text-sm text-base-content/70 hover:text-base-content transition-colors">
                        Terms
                    </a>
                </nav>

                <!-- Social Links -->
                <div class="flex items-center gap-4">
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base-content/70 hover:text-base-content rounded-xl hover:bg-base-300/50 transition-colors"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <x-ri-twitter-x-fill class="size-5" />
                    </a>
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base-content/70 hover:text-base-content rounded-xl hover:bg-base-300/50 transition-colors"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <x-ri-discord-fill class="size-5" />
                    </a>
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base-content/70 hover:text-base-content rounded-xl hover:bg-base-300/50 transition-colors"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <x-ri-github-fill class="size-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer> 