<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Opportunities') }}
            </h2>
            <div class="flex items-center justify-right">
                <a href="{{ route('create_account') }}">
                    <button class="font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Create An Account') }}
                    </button>
                </a>
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="{{ route('create_opportunity') }}">
                    <button class="font-semibold text-l text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Create An Opportunity') }}
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @if(auth()->user()->opportunities->isEmpty() && auth()->user()->accounts->isEmpty())
                  <div class="p-4">
                    <p>You have no account and no opportunity.</p>
                    <p>If you'd like to post an opportunity, please <a href="{{ route('create_account') }}"class="text-purple-500 underline hover:text-red-500">create an account</a>.</p>
                  </div>
                  
                  @else
                    @foreach( auth()->user()->opportunities as $opportunity)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="flex items-center p-6">
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Name: {{ $opportunity->name }}</h3>
                                    <p class="text-gray-500 dark:text-gray-400">Type: {{ $opportunity->type }}</p>
                                    <p class="text-gray-500 dark:text-gray-400">Description: {{ $opportunity->description }}</p>
                                    <p class="text-gray-500 dark:text-gray-400">Amount: {{ $opportunity->amount }}</p>
                                    <p class="text-gray-500 dark:text-gray-400">Stage: {{ $opportunity->stage }}</p>
                                    &nbsp;

                                    @if ($opportunity->account)
                                        <div class="flex items-center">
                                            <div class="flex_shrink-0 mr-4">
                                                @if ($opportunity->account->logo)
                                                <img src="{{ asset('storage/' . $opportunity->account->logo) }}"  alt="Account Logo" class="w-auto h-20 rounded-full">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <p class="text-blue-500 dark:text-blue-400">
                                                    {{ $opportunity->account->name }}
                                                    ({{ $opportunity->account->address }} -> {{ $opportunity->account->phonenumber }})
                                                </p>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-red-500 dark:text-red-400">No account linked</p>
                                    @endif

                                </div>
                            </div>
                            <div class="mt-2  ml-4 flex items-center gap-4">
                                <div class="flex mb-2">
                                 <a href ="{{route('edit_opportunity',$opportunity->id)}}">
                                    <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                 </a>
                                    @if (session('status') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                                <div class="flex mb-2">
                                    <form method="POST" action="{{ route('delete_opportunity', $opportunity->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this opportunity?')" class="px-4 py-2 bg-red-500 text-white rounded-md">{{ __('Delete') }}</button>
                                    </form>
                                
                                    @if (session('status') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                                
                            </div>
                            &nbsp;
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
