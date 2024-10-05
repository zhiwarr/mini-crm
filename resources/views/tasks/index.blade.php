<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('tasks.create') }}" class="my-5 p-10 text-white underline">Add Task</a>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-200">
                            <thead>
                                <tr class=" uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">title</th>
                                    <th class="py-3 px-6 text-left">Assigned User</th>
                                    <th class="py-3 px-6 text-center">Assigned Client</th>
                                    <th class="py-3 px-6 text-center">Assigned Project</th>
                                    <th class="py-3 px-6 text-center">status</th>
                                    <th class="py-3 px-6 text-center">Deadline</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class=" text-sm">
                                @foreach ($tasks as $task)
                                <tr class="border-b border-gray-200 hover:bg-slate-700">

                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $task->title }}</td>
                                    <td class="py-3 px-6 text-left">{{ $task->user->first_name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $task->client->company_name }}</td>
                                    <td class="py-3 px-6 text-center">{{ $task->project->title }}</td>
                                    <td class="py-3 px-6 text-center">{{ $task->status }}</td>
                                    <td class="py-3 px-6 text-center">{{ $task->deadline_at }}</td>
                                    <td class="py-3 flex justify-center px-6 text-center">
                                        <a href="{{ route('tasks.edit',$task) }}"
                                            class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                                        <form action="{{ route('tasks.destroy',$task) }}" method="POST"
                                            onsubmit="return confirm('are u sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-5">
                            {{ $tasks->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>