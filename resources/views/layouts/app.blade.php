<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div  class=" min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray-400 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-gray-700 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700 py-4">
            <div class="container mx-auto px-4">
                <div class="text-center text-black-500">
                    <p>&copy; {{ date('Y') }} Opportunity Management & Co. All rights reserved.</p>
                    <p>Address: 123 Main Street, City, Country</p>
                    <p>Email: info@company.com</p>
                    <p>Phone: +254 797 517 629</p>
                </div>
            </div>
        </footer>
    </body>
</html>
