<!-- Register Container -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-background to-background/95 p-4">
    <!-- Register Form Card -->
    <div class="w-full max-w-2xl">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <x-logo class="mx-auto mb-4 animate-float" />
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                {{ __('auth.sign_up_title') }}
            </h1>
        </div>

        <!-- Form -->
        <form wire:submit.prevent="submit" id="register" class="glass-light dark:glass-dark rounded-2xl p-8 backdrop-blur-xl shadow-xl">
            <div class="space-y-6">
                <!-- Name Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-form.input 
                        name="first_name" 
                        type="text" 
                        :label="__('general.input.first_name')"
                        :placeholder="__('general.input.first_name_placeholder')" 
                        wire:model="first_name" 
                        required
                        class="bg-background/50"
                    />
                    <x-form.input 
                        name="last_name" 
                        type="text" 
                        :label="__('general.input.last_name')"
                        :placeholder="__('general.input.last_name_placeholder')" 
                        wire:model="last_name" 
                        required
                        class="bg-background/50"
                    />
                </div>

                <!-- Email Field -->
                <x-form.input 
                    name="email" 
                    type="email" 
                    :label="__('general.input.email')"
                    :placeholder="__('general.input.email_placeholder')" 
                    required 
                    wire:model="email"
                    class="bg-background/50"
                />

                <!-- Password Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

                <!-- Custom Properties -->
                <x-form.properties :custom_properties="$custom_properties" :properties="$properties" />

                <!-- Captcha -->
                <x-captcha :form="'register'" />

                <!-- Register Button -->
                <x-button.primary class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 transition-all duration-300">
                    {{ __('Sign up') }}
                </x-button.primary>
            </div>
        </form>

        <!-- Sign In Link -->
        <p class="mt-6 text-center text-sm text-base/70">
            {{ __('auth.already_have_account') }}
            <a class="font-medium text-primary hover:text-primary/80 transition-colors" href="{{ route('login') }}" wire:navigate>
                {{ __('auth.sign_in') }}
            </a>
        </p>
    </div>
</div>