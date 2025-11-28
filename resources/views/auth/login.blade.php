<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
					<div style="display: flex; align-items: center; gap: 20px;">
						<svg width="320" height="150" viewBox="0 0 350 150" xmlns="http://www.w3.org/2000/svg">
							<g fill="none" stroke="red" stroke-width="2">
								<rect x="45" y="40" width="260" height="70" rx="10" ry="10" fill="navy"/>
								<circle cx="55" cy="75" r="5" fill="red"/>
								<rect x="85" y="30" width="15" height="15" fill="red"/>
								<rect x="130" y="30" width="15" height="15" fill="red"/>
								<rect x="175" y="30" width="15" height="15" fill="red"/>
								<rect x="220" y="30" width="15" height="15" fill="red"/>
								<rect x="265" y="30" width="15" height="15" fill="red"/>
								<rect x="85" y="110" width="15" height="15" fill="red"/>
								<rect x="130" y="110" width="15" height="15" fill="red"/>
								<rect x="175" y="110" width="15" height="15" fill="red"/>
								<rect x="220" y="110" width="15" height="15" fill="red"/>
								<rect x="265" y="110" width="15" height="15" fill="red"/>
							</g>
						</svg>

						<div style="display: flex; flex-direction: column; justify-content: center;">
							<h2 style="font-size: 48px; font-weight: bold; color: navy; margin: 0;">Autenticazione Utente</h2>
						</div>
					</div>
					
					<br/>
					
					<a href="{{ route('landingpage') }}" aria-label="Vai alla home" style="display:inline-flex; align-items:center; text-decoration:none;">
						<svg fill="none" stroke="navy" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							 viewBox="0 0 24 24" width="24" height="24" style="margin-right:6px;">
							<circle cx="12" cy="12" r="10" />
							<path d="M14 12H10" />         <!-- linea orizzontale -->
							<path d="M12 10l-2 2 2 2" />    <!-- punta della freccia -->
						</svg>
						<span style="color:navy; font-weight:bold;">Indietro</span>
					</a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ricordami') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
			
				<!--
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
				-->
				
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
