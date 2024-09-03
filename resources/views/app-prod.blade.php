<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">

        <title inertia>{{ config('app.name', 'Academy') }}</title>
        <link rel="icon" href="{{ asset('/favicon.webp') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        <link rel="stylesheet" href="{{ asset('build/assets/app-d9e3f7bd.css') }}">
         <link rel="stylesheet" href="{{ asset('build/assets/app-production.css') }}">
    </head>
    <body class="font-sans antialiased text-xs text-gray-700">

        <div id="root" class="min-h-screen">
        </div>
        <script src="{{ asset('build/assets/app-production.js') }}"></script>
    </body>
</html>
