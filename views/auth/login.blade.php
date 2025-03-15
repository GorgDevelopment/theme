<!-- Login Container -->
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-background via-background to-background/95 p-4">
    <!-- Login Form Card -->
    <div class="w-full max-w-md">
        <!-- Logo and Title -->
        <div class="text-center mb-8">
            <x-logo class="mx-auto mb-4 animate-float" />
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                {{ __('auth.sign_in_title') }}
            </h1>
        </div>

        <!-- Form -->
        <form wire:submit="submit" id="login" class="glass-light dark:glass-dark rounded-2xl p-8 backdrop-blur-xl shadow-xl">
            <!-- Email Input -->
            <div class="space-y-6">
                <x-form.input 
                    name="email" 
                    type="email" 
                    :label="__('general.input.email')"
                    :placeholder="__('general.input.email_placeholder')" 
                    wire:model="email" 
                    hideRequiredIndicator 
                    required 
                    class="bg-background/50"
                />

                <!-- Password Input -->
                <x-form.input 
                    name="password" 
                    type="password" 
                    :label="__('general.input.password')"
                    :placeholder="__('general.input.password_placeholder')" 
                    required 
                    hideRequiredIndicator 
                    wire:model="password"
                    class="bg-background/50"
                />

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between">
                    <x-form.checkbox name="remember" label="Remember me" wire:model="remember" />
                    <a class="text-sm font-medium text-primary hover:text-primary/80 transition-colors" href="{{ route('password.request') }}">
                        {{ __('auth.forgot_password') }}
                    </a>
                </div>

                <!-- Captcha -->
                <x-captcha :form="'login'" />

                <!-- Login Button -->
                <x-button.primary class="w-full bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 transition-all duration-300" type="submit">
                    {{ __('auth.sign_in') }}
                </x-button.primary>

                <!-- OAuth Providers -->
                @if (config('settings.oauth_github') || config('settings.oauth_google') || config('settings.oauth_discord'))
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <span class="w-full border-t border-neutral/30"></span>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 text-base/70 bg-background/50 rounded-full">
                                {{ __('auth.or_sign_in_with') }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        @foreach (['github', 'google', 'discord'] as $provider)
                            @if (config('settings.oauth_' . $provider))
                                <a href="{{ route('oauth.redirect', $provider) }}"
                                    class="flex items-center justify-center px-4 py-2.5 border border-neutral/30 rounded-xl bg-background/50 hover:bg-background/80 transition-colors">
                                    <img src="/assets/images/{{ $provider }}-dark.svg" alt="{{ $provider }}" class="size-5">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </form>

        <!-- Sign Up Link -->
        <p class="mt-6 text-center text-sm text-base/70">
            {{ __('auth.dont_have_account') }}
            <a class="font-medium text-primary hover:text-primary/80 transition-colors" href="{{ route('register') }}" wire:navigate>
                {{ __('auth.sign_up') }}
            </a>
        </p>
    </div>
</div>