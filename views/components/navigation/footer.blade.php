<footer class="w-full px-4 py-8 bg-background-secondary border-t border-neutral">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col items-center md:items-start gap-2">
                <x-logo class="h-8" />
                <div class="text-sm text-base/70">
                    {{ __('© :year :app_name. | All rights reserved.', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
                </div>
            </div>
            
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="https://status.cirrixo.com/" target="_blank" 
                    class="inline-flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg transition-colors">
                    <x-ri-pulse-line class="size-5" />
                    <span>Status</span>
                </a>
                
                {{-- Paymenter is free and opensource, removing this link is not cool --}}
                <a href="https://paymenter.org" target="_blank" 
                    class="group inline-flex items-center gap-2 px-4 py-2 bg-background border border-neutral hover:border-primary/50 rounded-lg transition-all">
                    <svg class="size-4 text-base/50 group-hover:text-primary" width="150" height="205" viewBox="0 0 150 205" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1_17)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 107V205H42.8571V139.638H100C133.333 139.638 150 123 150 89.7246V69.5L75 107V69.5L148.227 32.8863C143.133 10.9621 127.057 0 100 0H0V107ZM0 107V69.5L75 32V69.5L0 107Z"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_1_17">
                                <rect width="150" height="205"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="text-sm">{{ __('Powered by') }} Paymenter</span>
                </a>
            </div>
        </div>
    </div>
</footer>