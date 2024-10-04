<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients Create') }}
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-white mb-6">Create Clients</h2>

        <form action="{{ isset($client)  ? route('clients.update', $client) : route('clients.store') }}" method="POST">
            @csrf
            @isset($client) @method('PUT') @endisset

            <!-- contact name -->
            <div class="mb-4">
                <x-input-label for="contact_name" :value="__('contact name')" class="text-gray-300" />
                <x-text-input id="contact_name" name="contact_name" type="text" placeholder="Your Contact Name"
                    :value="old('contact_name', isset($client) ? $client->contact_name : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
            </div>

            <!-- contact email -->
            <div class="mb-4">
                <x-input-label for="contact_email" :value="__('contact email')" class="text-gray-300" />
                <x-text-input id="contact_email" name="contact_email" type="email" placeholder="Your contact email"
                    :value="old('contact_email', isset($client) ? $client->contact_email : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
            </div>

            <!-- contact phone number -->
            <div class="mb-4">
                <x-input-label for="contact_phone_number" :value="__('Contact_phone_number')" class="text-gray-300" />
                <x-text-input id="contact_phone_number" name="contact_phone_number" type="text"
                    placeholder="Your Contact_phone_number"
                    :value="old('contact_phone_number', isset($client) ? $client->contact_phone_number : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
            </div>

            <!-- Company_name -->
            <div class="mb-4">
                <x-input-label for="company_name" :value="__('Company_name')" class="text-gray-300" />
                <x-text-input id="company_name" name="company_name" type="text" placeholder="Your Company_name"
                    :value="old('company_name', isset($client) ? $client->company_name : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>

            <!-- company_address -->
            <div class="mb-4">
                <x-input-label for="company_address" :value="__('company address')" class="text-gray-300" />
                <x-text-input id="company_address" name="company_address" type="text" placeholder="Your company address"
                    :value="old('company_address', isset($client) ? $client->company_address : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
            </div>
            <!-- company_city -->
            <div class="mb-4">
                <x-input-label for="company_city" :value="__('company city')" class="text-gray-300" />
                <x-text-input id="company_city" name="company_city" type="text" placeholder="Your company city"
                    :value="old('company_city', isset($client) ? $client->company_city : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
            </div>
            <!-- company_zip -->
            <div class="mb-4">
                <x-input-label for="company_zip" :value="__('company zip')" class="text-gray-300" />
                <x-text-input id="company_zip" name="company_zip" type="text" placeholder="Your company zip"
                    :value="old('company_zip', isset($client) ? $client->company_zip : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
            </div>
            <!-- company_vat -->
            <div class="mb-4">
                <x-input-label for="company_vat" :value="__('company vat')" class="text-gray-300" />
                <x-text-input id="company_vat" name="company_vat" type="text" placeholder="Your company vat"
                    :value="old('company_vat', isset($client) ? $client->company_vat : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <x-primary-button class="w-full">
                    {{ isset($client) ? __('Update') : __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>