<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Create') }}
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-white mb-6">Create Users</h2>

        <form action="{{ isset($user)  ? route('users.update', $user) : route('users.store') }}" method="POST">
            @csrf
            @isset($user) @method('PUT') @endisset

            <!-- First Name -->
            <div class="mb-4">
                <x-input-label for="first_name" :value="__('First Name')" class="text-gray-300" />
                <x-text-input id="first_name" name="first_name" type="text" placeholder="Your First Name"
                    :value="old('first_name', isset($user) ? $user->first_name : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <x-input-label for="last_name" :value="__('Last Name')" class="text-gray-300" />
                <x-text-input id="last_name" name="last_name" type="text" placeholder="Your Last Name"
                    :value="old('last_name', isset($user) ? $user->last_name : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                <x-text-input id="email" name="email" type="email" placeholder="Your Email"
                    :value="old('email', isset($user) ? $user->email : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            @if (!isset($user) && request()->method('POST'))
            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
                <x-text-input id="password" name="password" type="password" placeholder="Your Password"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Password Confirmation -->
            <div class="mb-4">
                <x-input-label for="password_confirmation" :value="__('Password Confirmation')" class="text-gray-300" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    placeholder="Your Password Confirmation" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            @endif

            <!-- Submit Button -->
            <div class="text-center">
                <x-primary-button class="w-full">
                    {{ isset($user) ? __('Update') : __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>