<x-app-layout>
    <x-slot name="header">
     <div class="flex items-center justify-between">
        <h2 class=" font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create An  Opportunity') }}
        </h2>
       
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form method = POST action="{{route('store_opportunity')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="mt-6">
                        <label for="name" class="block font-medium text-lg"> Name:</label>
                        <input type="text" id="name" name="name" class="mt-1  w-3/4 rounded-md ">
                    </div>

                    <div class='mt-6'>
                        <label for="type" class="block font-medium text-lg">Type:</label>
                        <input type="text" id="type" name="type" class="mt-1  w-3/4 rounded-md" placeholder="eg.Web Development, Application,Networking">
                    </div>

                    

                    <div class="mt-6">
                        <label for="description" class="block font-medium text-lg">Description:</label>
                        <textarea id="description" name="description" class="mt-1 w-3/4 rounded-md" rows="4" maxlength="500" required></textarea>
                        <p  id="description-counter" class="text-sm text-gray-500">Maximum 500 words</p>
                    </div>

                    <script>
                        const textarea = document.getElementById('description');
                        const counter = document.getElementById('description-counter');
 
                        textarea.addEventListener('input', function() {
                                const remainingChars = textarea.maxLength - textarea.value.length;
                                 counter.textContent = `Remaining characters: ${remainingChars}`;
                       });
                 </script>
                    

                    <div class="mt-6">
                        <label for="amount" class="block font-medium text-lg">Amount:</label>
                        <select id="amount" name="amount" class="mt-1 w-3/4 rounded-md">
                            <option value="" disabled selected>Choose Price Range of Job</option>
                            <option value="$0-$50">$0-$50</option>
                            <option value="$51-$100">$51-$100</option>
                            <option value="$101-$200">$101-$200</option>
                            <option value="$201-$300">$201-$300</option>
                            <option value="$301-$400">$301-$400</option>
                            <option value="$401-$500">$401-$500</option>
                            <option value="more than $500">more than $500</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <label for="stage" class="block font-medium text-lg">Stage:</label>
                        <select id="stage" name="stage" class="mt-1 w-3/4 rounded-md">
                            <option value="" disabled selected>Choose Stage of Job</option>
                            <option value="Discovery">Discovery</option>
                            <option value="Proposal Shared">Proposal Shared</option>
                            <option value="Negotiations">Negotiations</option>
                        </select>
                    </div>

                    <div class="mt-6">
                        <label for="account" class="block font-medium text-lg">Account:</label>
                        @if($accounts->isEmpty()){
                          <p>No account Present</p>
                          <a href="{{ route('create_account') }}">Add an Account First</a>
                        }
                        @else
                        <select id="account" name="account" class="mt-1 w-3/4 rounded-md">
                            <option value="" disabled selected>Link This Opportunity to An Account</option>
                            @foreach($user->accounts as $account)
                                <option value="{{ $account->id }}" {{ old('account') == $account->id ? 'selected' : '' }}>
                                    <img src="{{ asset('storage/logos/'.$account->logo) }}" alt="Account Logo" class="mr-2 h-6 w-6">
                                    {{ $account->name }} ({{ $account->address }} -> {{ $account->phonenumber }})
                                </option>
                            @endforeach
                        </select>
                        
                       @endif
                    </div>


                    <div class=" mt-6 flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
            
                        @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400"
                              >{{ __('Saved.') }}
                           </p>
                        @endif
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
