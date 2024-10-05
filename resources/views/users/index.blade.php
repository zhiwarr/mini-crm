<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('users.create') }}" class="my-5 p-10 text-white underline">Add User</a>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead>
                                <tr class=" uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">First Name</th>
                                    <th class="py-3 px-6 text-left">Last Name</th>
                                    <th class="py-3 px-6 text-center">Email</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class=" text-sm">
                                @foreach ($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-slate-700">

                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->first_name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $user->first_name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                                    <td class="py-3 flex justify-center px-6 text-center">
                                        <a href="{{ route('users.edit',$user) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                        @can(\App\PermissionEnum::MANAGE_USER)

                                        <form action="{{ route('users.destroy',$user) }}" method="POST"
                                            onsubmit="return confirm('are u sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">
                            {{ $users->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>