<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Service Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-base font-semibold leading-7 text-gray-900 dark:text-gray-300">
                            Service Information
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Details about the service.
                        </p>
                    </div>
                    <div class="mt-6 border-t border-gray-100 dark:border-gray-700">
                        <dl class="divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">
                                    Service Name
                                </dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 dark:text-gray-200 sm:col-span-2 sm:mt-0">
                                    {{ $service->service }}
                                </dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-sm font-medium leading-6 text-gray-900 dark:text-gray-300">
                                    Status
                                </dt>
                                <dd class="mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0">
                                    @if ($service->status == 1)
                                        <span class="inline-block bg-[rgb(22,163,74,0.2)] text-green-600 dark:text-green-400 rounded px-2 py-1 text-xs">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-block bg-[rgba(163,22,22,0.2)] text-red-600 dark:text-red-400 rounded px-2 py-1 text-xs">
                                            Inactive
                                        </span>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="mt-6 text-right">
                        <a href="{{ route('services.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                            Back to Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
