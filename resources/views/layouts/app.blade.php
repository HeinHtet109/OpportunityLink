<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/opp_app...slate.css', 'resources/js/opp_app...slate.js'])
    </head>
    <body class="bg-white selection:bg-purple-500 selection:text-white scrollbar scrollbar-w-3 scrollbar-thumb-rounded-[0.25rem] scrollbar-track-slate-200 scrollbar-thumb-gray-400 dark:scrollbar-track-gray-900 dark:scrollbar-thumb-gray-700" x-data="{ darkMode: false }" x-init="if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak
        x-bind:class="{ 'dark': darkMode === true }">
        <div class="min-h-screen dark:bg-gray-900 bg-gray-100 ">
            {{-- @if (in_array('auth',Route::getCurrentRoute()->gatherMiddleware()))

            @endif --}}
            @include('layouts.partials.navigation')

            <!-- Page Content -->
            <main class="bg-white dark:bg-gray-900">
                {{ $slot }}
            </main>

            @include('layouts.partials.footer')
        </div>
    </body>
</html>
