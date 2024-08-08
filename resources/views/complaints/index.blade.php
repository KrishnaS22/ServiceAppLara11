<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Complaints') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @role('user')
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('complaints.create') }}"
                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Create Complaint
                        </a>
                    </div>
                    @endrole
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr
                                    class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left w-16">ID</th>
                                    <th class="py-3 px-6 text-left w-40">User</th>
                                    <th class="py-3 px-6 text-left w-40">Service</th>
                                    {{-- <th class="py-3 px-6 text-left w-48">Complaint Details</th> --}}
                                    <th class="py-3 px-6 text-left w-40">Staff Name</th>
                                    <th class="py-3 px-6 text-left w-16">Status</th>
                                    <th class="py-3 px-6 text-center w-40">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-200 text-sm font-light">
                                @foreach ($complaints as $complaint)
                                    <tr
                                        class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <td class="py-3 px-6">{{ $complaint->id }}</td>
                                        <td class="py-3 px-6">{{ $complaint->user->name }}</td>
                                        <td class="py-3 px-6">{{ $complaint->service->service }}</td>
                                        {{-- <td class="py-3 px-6 truncate max-w-xs">
                                            {{ Str::limit($complaint->details, 30) }}
                                        </td> --}}
                                        <td class="py-3 px-6">
                                            {{ $complaint->staff_id ? $complaint->staff->user->name : '' }}
                                        </td>
                                        <td class="py-3 px-6">
                                            @if ($complaint->status == 1)
                                                <span
                                                    class="inline-block bg-[rgb(22,163,74,0.2)] text-green-600 rounded px-2 py-1 text-xs">
                                                    Active
                                                </span>
                                            @else
                                                <span
                                                    class="inline-block bg-[rgba(163,22,22,0.2)] text-red-600 rounded px-2 py-1 text-xs">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('complaints.show', $complaint->id) }}"
                                                    class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs">
                                                    View
                                                </a>
                                                <a href="{{ route('complaints.edit', $complaint->id) }}"
                                                    class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-xs">
                                                    Edit
                                                </a>
                                                @role('admin')
                                                <form action="{{ route('complaints.destroy', $complaint->id) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endrole
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
