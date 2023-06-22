<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Account Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Account Details Container -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 flex items-center justify-center">
                    @if($account->logo)
                        <div class="flex items-center">
                            <div class="mr-4">
                                <img src="{{ asset('storage/' . $account->logo) }}" alt="Company Logo" class="h-20 w-auto rounded-full">
                            </div>

                            &nbsp;
                            &nbsp;
                            <div>
                                <h3 class="text-2xl font-semibold">{{ $account->name }}</h3>
                                <p>{{ $account->address }}</p>
                                <p>{{ $account->phonenumber }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            

            <!-- Opportunities Container -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-xl font-semibold mb-4">Opportunities</h4>
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                        @if($opportunities->count() > 0)
                        @foreach($opportunities as $index => $opportunity)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg {{ $index < count($opportunities) - 1 ? 'border-b border-gray-300' : '' }}">
                                    <div class=" p-6">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Name: {{ $opportunity->name }}</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Type: {{ $opportunity->type }}</p>
                                        <p class="text-gray-500 dark:text-gray-400">Description: {{ $opportunity->description }}</p>
                                        <p class="text-gray-500 dark:text-gray-400">Amount: {{ $opportunity->amount }}</p>
                                        <p class="text-red-500 dark:text-red-400">Stage: {{ $opportunity->stage }}</p> 
                                    </div>
                                </div>
                            @endforeach
                          @else
                            <p>No opportunities found for this account.</p>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                    