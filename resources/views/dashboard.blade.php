<x-app-layout>
    <x-slot name="header">
    
      <div class="bg-gray-400 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">     
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
         </h2>
         &nbsp;
       <h1 class="font-bold text-l text-gray-800 dark:text-gray-200 leading-tight">Welcome!!<h3 class="font- text-m text-gray-800 dark:text-gray-200 leading-tight"> These are all accounts with various opportunities.
            Feel free to check each opportunity out.</h3></h1>
         
          
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @if($accounts->count() > 0)
                        @foreach($accounts->sortByDesc('created_at') as $account)
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <a href="{{ route('account_show', $account->id) }}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="flex items-center p-6">
                                        @if ($account->logo)
                                            <div class="flex-shrink-0 mr-4">
                                                <img src="{{ asset('storage/' . $account->logo) }}" alt="Account Logo" class="h-20 w-auto rounded-full">
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $account->name }}</h3>
                                            <p class="text-gray-500 dark:text-gray-400">{{ $account->address }}</p>
                                            <p class="text-gray-500 dark:text-gray-400">{{ $account->phonenumber }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <p>No accounts found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
    