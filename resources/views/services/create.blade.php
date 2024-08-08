<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('services.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="service" :value="__('Service')" />
                            <x-text-input id="service" class="block mt-1 w-full" type="text" name="service" :value="old('service')" required autofocus autocomplete="service" />
                            <x-input-error :messages="$errors->get('service')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <div class="flex items-center">
                                <label for="status-active" class="mr-4">
                                    <input id="status-active" type="radio" name="status" value="1" class="form-radio text-blue-600" required />
                                    <span class="ml-2">Active</span>
                                </label>
                                <label for="status-inactive">
                                    <input id="status-inactive" type="radio" name="status" value="0" class="form-radio text-blue-600" required />
                                    <span class="ml-2">Inactive</span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            {{ __('Create') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
