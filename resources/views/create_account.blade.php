<x-app-layout>
    <x-slot name="header">
     <div class="flex items-center justify-between">
        <h2 class=" font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Account') }}
        </h2>
       
     </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form method = POST action="{{route('store_account')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="logo" class="block font-medium text-lg">Company Logo</label>
                        <input type="file" id="logo" name="logo" class="mt-1  w-full rounded-md" accept="image/*">
                    </div>

                    <div class="mt-6">
                        <label for="name" class="block font-medium text-lg">Company Name:</label>
                        <input type="text" id="name" name="name" class="mt-1  w-3/4 rounded-md ">
                    </div>

                    <div class="mt-6">
                        <label for="address" class="block font-medium text-lg">Address:</label>
                        <input type="text" id="address" name="address" class="mt-1 w-3/4 rounded-md">
                    </div>

                    <div class="mt-6">
                        <label for="phonenumber" class="block font-medium text-lg">Contact:</label>
                        <input type="tel" id="phonenumber" name="phonenumber" class="mt-1  w-3/4 rounded-md">
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
                            >{{ __('Saved.') }}</p>
                        @endif
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>