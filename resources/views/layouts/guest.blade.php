<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/opp_app...slate.css', 'resources/js/opp_app...slate.js', 'resources/css/opp_app...slate.scss'])
</head>

<body style="background: linear-gradient(to right, rgb(243,244,246) 50%, rgb(255, 255, 255) 50%);">
    <div class="mx-auto max-w-[1600px]">
        <div class="relative min-h-screen flex md:flex-row flex-col">
            <a href="{{ route('web.starter.home') }}">
                <div class="absolute left-1 top-1 ml-6 mt-6 flex items-center">
                    <div class="mr-2 h-10 w-10">
                        <div class="relative h-full w-full" small="true">
                            <x-application-logo class="fill-current text-gray-500" />
                        </div>
                    </div>
                    <p class="font-medium">{{ config('app.name', 'Laravel') }}</p>
                </div>
            </a>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
