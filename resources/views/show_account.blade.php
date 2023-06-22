<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Account Details') }}
        </h2>
        
        

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-2">{{ $account->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $account->address }}</p>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $account->phonenumber }}</p>

                    @if ($account->logo)
                        <div class="flex items-center">
                            <span class="mr-2">Company Logo:</span>
                            <img src="{{ asset('storage/' . $account->logo) }}" alt="Company Logo" class="h-12 w-12 rounded-full">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
