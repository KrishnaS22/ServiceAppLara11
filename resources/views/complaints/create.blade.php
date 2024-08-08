<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Complaints') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="service_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Service</label>
                            <select name="service_id" id="service_id"
                                class="block w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="" disabled selected>Select a service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="details"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Details</label>
                            <textarea name="details" id="details"
                                class="block w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                rows="5" required></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
