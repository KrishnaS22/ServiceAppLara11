<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Staffs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('staffs.update', $staff->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Staff Name -->
                        <div class="mb-4">
                            <label for="staff"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Staff</label>
                            <input type="text" id="staff"
                                class="mt-1 block w-full bg-gray-100 dark:bg-gray-600 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                value="{{ $staff->user->name }}" disabled>
                        </div>

                        <!-- Service -->
                        <div class="mb-4">
                            <label for="service"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service</label>
                            <select name="service_id" id="service"
                                class="mt-1 block w-full bg-gray-100 dark:bg-gray-600 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ $service->id == $staff->service_id ? 'selected' : '' }}>
                                        {{ $service->service }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
