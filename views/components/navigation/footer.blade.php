<footer class="w-full px-4 py-8 bg-background-secondary/95 backdrop-blur-sm border-t border-neutral/50">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col items-center md:items-start gap-3">
                <div class="flex items-center gap-3">
                    <x-logo class="h-8" />
                    <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">{{ config('app.name') }}</span>
                </div>
                <div class="text-sm text-base/70">
                    {{ __('© :year :app_name. | All rights reserved.', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
                </div>
            </div>
            
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex items-center gap-2 px-3 py-2 bg-background-secondary rounded-lg border border-neutral/50">
                    <x-ri-time-line class="size-4 text-base/70" />
                    <span class="text-sm text-base/70" x-data x-init="$el.textContent = new Date().toLocaleTimeString()" x-intersect.full="setInterval(() => $el.textContent = new Date().toLocaleTimeString(), 1000)"></span>
                </div>
                
                <div class="h-6 w-px bg-neutral/50"></div>
                
                <div class="flex items-center gap-4">
                    <a href="#" class="text-base/70 hover:text-primary transition-colors">
                        <x-ri-twitter-x-fill class="size-5" />
                    </a>
                    <a href="#" class="text-base/70 hover:text-primary transition-colors">
                        <x-ri-discord-fill class="size-5" />
                    </a>
                    <a href="#" class="text-base/70 hover:text-primary transition-colors">
                        <x-ri-github-fill class="size-5" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>