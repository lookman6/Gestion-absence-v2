<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="cin" :value="__('CIN')" />

                <x-input id="cin" class="block mt-1 w-full" type="text" name="cin" :value="old('cin')" required autofocus />
            </div>

             <div>
                <x-label for="lastname" :value="__('Lastname')" />

                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />
            </div>

             <div>
                <x-label for="firstname" :value="__('Firstname')" />

                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
            </div>

             <div>
                <x-label for="birthday" :value="__('Birthday')" />

                <x-input id="birthday" class="block mt-1 w-full" type="text" name="birthday" :value="old('birthday')" required autofocus />
            </div>

            <div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="masculin" value="masculin" checked>
                        <label class="form-check-label" for="masculin">
                          Masculin
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="feminin" value="feminin">
                        <label class="form-check-label" for="feminin">
                          Feminin
                        </label>
                      </div>
                    </div>
                  </fieldset>
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
