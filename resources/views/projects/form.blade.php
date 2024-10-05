<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects Create') }}
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-white mb-6">Create Projects</h2>

        <form action="{{ isset($project)  ? route('projects.update', $project) : route('projects.store') }}"
            method="POST">
            @csrf
            @isset($project) @method('PUT') @endisset

            <!-- title -->
            <div class="mb-4">
                <x-input-label for="title" :value="__('title')" class="text-gray-300" />
                <x-text-input id="title" name="title" type="text" placeholder="Your title"
                    :value="old('title', isset($project) ? $project->title : '')" class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="mb-4">
                <x-input-label for="description" :value="__('description')"
                    class="text-gray-300 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                <textarea id="description" name="description" type="text" placeholder="Your description"
                    class="block mt-1 w-full">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- deadline at -->
            <div class="mb-4">
                <x-input-label for="deadline_at" :value="__('Deadline')" class="text-gray-300" />
                <x-text-input id="deadline_at" name="deadline_at" type="date" placeholder="Your Deadline"
                    :value="old('deadline_at', isset($project) ? $project->deadline_at : '')"
                    class="block mt-1 w-full" />
                <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
            </div>
            <!-- Assigned Client -->
            <div class="mb-4">
                <x-input-label for="user_id" :value="__('Assigned User')" class="text-gray-300" />
                <select name="user_id" id="user_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" @isset($project) @selected($project->user_id ==
                        $user->id) @else @selected(old('user_id')==$user->id)
                        @endisset
                        class="block mt-1 w-full">
                        {{ $user->first_name }} {{ $user->last }}
                    </option>
                    @endforeach
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                </select>

            </div>
            <!-- Assigned Client -->
            <div class="mb-4">
                <x-input-label for="client_id" :value="__('Assigned Client')" class="text-gray-300" />
                <select name="client_id" id="client_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500">
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}" @isset($project) @selected($project->client_id ==
                        $client->id) @else @selected(old('client_id')==$client->id)
                        @endisset
                        class="block mt-1 w-full">
                        {{ $client->company_name }}
                    </option>
                    @endforeach
                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                </select>
                <!-- status -->
                <div class="mb-4">
                    <x-input-label for="status" :value="__('status')" class="text-gray-300" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500">
                        @foreach (\App\ProjectStatus::cases() as $status)
                        <option value="{{ $status->value }}" @isset($project) @selected($project->status ==
                            $status->value) @else @selected(old('status')==$status->value)
                            @endisset
                            class="block mt-1 w-full">
                            {{ $status->value }}
                        </option>
                        @endforeach
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </select>

                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <x-primary-button class="w-full">
                        {{ isset($project) ? __('Update') : __('Create') }}
                    </x-primary-button>
                </div>
        </form>
    </div>
</x-app-layout>