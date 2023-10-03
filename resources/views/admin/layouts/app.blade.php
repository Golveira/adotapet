<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
    @livewireStyles
</head>

<body class="font-sans antialiased">
    @include('sweetalert::alert')

    <div class="bg-gray-50 antialiased dark:bg-gray-900">
        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <main class="h-auto p-4 pt-20 md:ml-64">
            @yield('content')
        </main>
    </div>

    @stack('modals')
    @stack('scripts')
    @livewireScripts
</body>

</html>
