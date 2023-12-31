<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div class="mt-4">
                <x-label for="firstname" value="{{ __('First Name') }}" />
                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="given-name" />
            </div>

            <!-- Last Name / Surname -->
            <div class="mt-4">
                <x-label for="surname" value="{{ __('Last Name') }}" />
                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required/>
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone (PH)') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required  pattern="^(09|\+639)\d{9}$" />
            </div>
            
            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            </div>

            <div class="mt-4">
                <x-label for="district" value="{{ __('District') }}" />
                <x-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" required />
            </div>

            <div class="mt-4">
                <x-label for="street" value="{{ __('Street') }}" />
                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
