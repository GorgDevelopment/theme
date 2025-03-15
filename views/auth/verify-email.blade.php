<!-- Email Verification Container -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-background to-background/95 p-4">
    <!-- Email Verification Card -->
    <div class="w-full max-w-md">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <x-logo class="mx-auto mb-4 animate-float" />
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                {{ __('auth.verification.notice') }}
            </h1>
            <p class="mt-4 text-base/70">
                {{ __('auth.verification.check_your_email') }}
            </p>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="resend" id="verify-email" class="glass-light dark:glass-dark rounded-2xl p-8 backdrop-blur-xl shadow-xl">
            <div class="space-y-6">
                <!-- Captcha -->
                <x-captcha :form="'verify-email'" />

                <!-- Resend Section -->
                <div class="space-y-4">
                    <p class="text-base/70 text-center">
                        {{ __('auth.verification.not_received') }}
                    </p>
                    <x-button.primary class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 transition-all duration-300" type="submit">
                        {{ __('auth.verification.request_another') }}
                    </x-button.primary>
                </div>

                <!-- Back to Login -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-primary hover:text-primary/80 transition-colors" wire:navigate>
                        {{ __('auth.back_to_login') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>