<!-- Password Reset Container -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-background to-background/95 p-4">
    <!-- Password Reset Form Card -->
    <div class="w-full max-w-md">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <x-logo class="mx-auto mb-4 animate-float" />
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                {{ __('auth.reset_password') }}
            </h1>
        </div>

        <!-- Form -->
        <form wire:submit="submit" id="reset" class="glass-light dark:glass-dark rounded-2xl p-8 backdrop-blur-xl shadow-xl">
            <div class="space-y-6">
                <!-- Email Input (Disabled) -->
                <x-form.input 
                    name="email" 
                    type="email" 
                    :label="__('auth.input.email_label')" 
                    :placeholder="__('auth.input.email')"
                    wire:model="email" 
                    required 
                    disabled
                    class="bg-background/50"
                />

                <!-- Password Fields -->
                <div class="space-y-4">
                    <x-form.input 
                        name="password" 
                        type="password" 
                        :label="__('Password')" 
                        :placeholder="__('Your password')"
                        wire:model="password" 
                        required
                        class="bg-background/50"
                    />
                    <x-form.input 
                        name="password_confirm" 
                        type="password" 
                        :label="__('Password')"
                        :placeholder="__('Confirm your password')" 
                        wire:model="password_confirmation" 
                        required
                        class="bg-background/50"
                    />
                </div>

                <!-- Captcha -->
                <x-captcha :form="'reset'" />

                <!-- Reset Button -->
                <x-button.primary class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 transition-all duration-300" type="submit">
                    {{ __('auth.reset_password') }}
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