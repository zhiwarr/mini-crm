<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users Create') }}
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-white mb-6">Create Users</h2>
        <form action="{{ isset($user)  ? route('users.update',$user) : route('users.store') }}" method="POST">
            @csrf
            @isset($user) @method('PUT') @endisset
            @isset($user)

            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Your First_name"
                    value="{{ old('first_name', isset($user) ? $user->first_name : '') }}"
                    class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name"
                    value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" placeholder="Your Last_name"
                    class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email"
                    value="{{ old('email', isset($user) ? $user->email : '') }}"
                    class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            @endisset
            @if (!isset($user) && request()->method('POST'))

            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your Password"
                    class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div class="mb-4">
                <label class="block text-gray-300 text-sm font-bold mb-2" for="password_confirmation">Password
                    Confirmation</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Your Password_confirmation"
                    class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            @endif


            <div class="text-center">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Create</button>
            </div>
        </form>
    </div>

</x-app-layout>