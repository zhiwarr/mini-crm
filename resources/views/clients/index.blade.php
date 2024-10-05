<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('clients.create') }}" class="my-5 p-10 text-white underline">Add Client</a>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead>
                                <tr class=" uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Contact Name</th>
                                    <th class="py-3 px-6 text-left">Contact Email</th>
                                    <th class="py-3 px-6 text-center">contact phone number</th>
                                    <th class="py-3 px-6 text-center">company name</th>
                                    <th class="py-3 px-6 text-center">company address</th>
                                    <th class="py-3 px-6 text-center">company city</th>
                                    <th class="py-3 px-6 text-center">company zip</th>
                                    <th class="py-3 px-6 text-center">company vat</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class=" text-sm">
                                @foreach ($clients as $client)
                                <tr class="border-b border-gray-200 hover:bg-slate-700">

                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $client->contact_name }}</td>
                                    <td class="py-3 px-6 text-left">{{ $client->contact_email }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->contact_phone_number }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->company_name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->company_address }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->company_city }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->company_zip }}</td>
                                    <td class="py-3 px-6 text-center">{{ $client->company_vat }}</td>
                                    <td class="py-3 flex justify-center px-6 text-center">
                                        <a href="{{ route('clients.edit',$client) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                        @can(\App\PermissionEnum::DELETE_CLIENT)

                                        <form action="{{ route('clients.destroy',$client) }}" method="POST"
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
                            {{ $clients->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>