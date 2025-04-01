<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Event Promotions') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <nav class="flex justify-between items-center bg-slate-900 p-4 py-2 text-white">
        <a href="{{ route('home') }}" class="font-medium font-sans hover:-translate-y-0.5 transition">J Events</a>
        <a href="{{ route('promotions.create') }}"
            class="hover:bg-slate-700 text-sm transition px-2 py-1.5 rounded">Create</a>
    </nav>
    <main class="w-full max-w-5xl  mx-auto p-4">
        @yield('content')
    </main>
</body>

</html>
