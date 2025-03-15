<!-- Footer -->
<footer class="relative w-full px-4 py-12">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-background/80 backdrop-blur-xl border-t border-neutral/10"></div>

    <!-- Content -->
    <div class="relative container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
            <!-- Logo and Copyright -->
            <div class="flex flex-col items-center md:items-start gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group" wire:navigate>
                    <x-logo class="h-8 transition-transform group-hover:scale-110" />
                    <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                        {{ config('app.name') }}
                    </span>
                </a>
                <div class="text-sm text-base/70">
                    {{ __('© :year :app_name. | All rights reserved.', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
                </div>
            </div>
            
            <!-- Right Side -->
            <div class="flex flex-wrap items-center gap-6">
                <!-- Time -->
                <div class="glass-light dark:glass-dark flex items-center gap-3 px-4 py-2.5 rounded-xl">
                    <x-ri-time-line class="size-4 text-base/70" />
                    <span 
                        class="text-sm font-medium text-base/70" 
                        x-data 
                        x-init="$el.textContent = new Date().toLocaleTimeString()" 
                        x-intersect.full="setInterval(() => $el.textContent = new Date().toLocaleTimeString(), 1000)"
                    ></span>
                </div>
                
                <!-- Status -->
                <a 
                    href="https://status.cirrixo.com/" 
                    target="_blank"
                    class="glass-light dark:glass-dark inline-flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-neutral/10 transition-colors"
                >
                    <x-ri-pulse-line class="size-4 text-success" />
                    <span class="text-sm font-medium text-base/70">Status</span>
                </a>
                
                <!-- Social Links -->
                <div class="flex items-center gap-4">
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base/70 hover:text-base rounded-xl hover:bg-neutral/10 transition-colors"
                        target="_blank"
                    >
                        <x-ri-twitter-x-fill class="size-5" />
                    </a>
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base/70 hover:text-base rounded-xl hover:bg-neutral/10 transition-colors"
                        target="_blank"
                    >
                        <x-ri-discord-fill class="size-5" />
                    </a>
                    <a 
                        href="#" 
                        class="inline-flex items-center justify-center size-10 text-base/70 hover:text-base rounded-xl hover:bg-neutral/10 transition-colors"
                        target="_blank"
                    >
                        <x-ri-github-fill class="size-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>