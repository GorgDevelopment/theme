<!-- 2FA Verification Container -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-background to-background/95 p-4">
    <!-- 2FA Verification Form Card -->
    <div class="w-full max-w-md">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <x-logo class="mx-auto mb-4 animate-float" />
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                {{ __('auth.verify_2fa') }}
            </h1>
            <p class="mt-4 text-base/70">
                {{ __('auth.verify_2fa_description') }}
            </p>
        </div>

        <!-- Form -->
        <form wire:submit="verify" class="glass-light dark:glass-dark rounded-2xl p-8 backdrop-blur-xl shadow-xl">
            <div class="space-y-6">
                <!-- 2FA Code Input -->
                <x-form.input 
                    name="code" 
                    type="text" 
                    :label="__('account.input.two_factor_code')" 
                    :placeholder="__('account.input.two_factor_code_placeholder')" 
                    wire:model="code" 
                    required
                    class="bg-background/50 text-center tracking-[0.5em] font-mono text-lg"
                    maxlength="6"
                    autocomplete="one-time-code"
                />

                <!-- Verify Button -->
                <x-button.primary class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 transition-all duration-300" type="submit">
                    {{ __('auth.verify') }}
                </x-button.primary>

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