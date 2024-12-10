<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <!-- Email -->


            <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" value="{{ __('Gender') }}" />
                <select id="gender"
                    style="border: 1px solid rgb(209 213 219 / var(--tw-border-opacity, 1)); border-radius: 5px"
                    name="gender" class="block mt-1 w-full" required>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                    <option value="other">{{ __('Other') }}</option>
                </select>
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required />
            </div>

            <!-- City Dropdown -->
            <div class="mt-4">
                <x-label for="city" value="{{ __('City') }}" />
                <select id="city"
                    style="border: 1px solid rgb(209 213 219 / var(--tw-border-opacity, 1)); border-radius: 5px"
                    name="city" class="block mt-1 w-full" required>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>






            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <!-- Blood Donation Checkbox -->
            <div class="mt-4">
                <x-label>
                    <div class="flex items-center">
                        <input type="checkbox"
                            style="border: 1px solid rgb(209 213 219 / var(--tw-border-opacity, 1)); border-radius: 5px"
                            id="donate_blood" name="donate_blood" value="1" class="mr-2" />
                        {{ __('Do you want to donate blood?') }}
                    </div>
                </x-label>
            </div>

            <!-- Blood Group Dropdown -->
            <div id="blood_group_section" class="mt-4 hidden">
                <x-label for="blood_group" value="{{ __('Select Blood Group') }}" />
                <select id="blood_group" name="blood_group" class="block mt-1 w-full">
                    <option value="">-- Select Blood Group --</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Already Registered -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
<script>
    const bloodCheckbox = document.getElementById('donate_blood');
    const bloodGroupSection = document.getElementById('blood_group_section');

    bloodCheckbox.addEventListener('change', function() {
        if (this.checked) {
            bloodGroupSection.classList.remove('hidden');
        } else {
            bloodGroupSection.classList.add('hidden');
        }
    });
</script>
