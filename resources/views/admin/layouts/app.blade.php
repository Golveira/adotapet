<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

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

    @stack('styles')

    @livewireStyles
</head>

<body class="font-sans antialiased">
    @include('sweetalert::alert')
    @include('admin.layouts.header')

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('admin.layouts.sidebar')

        <div id="main-content"
            class="relative w-full min-h-screen overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            @yield('content')

            @include('admin.layouts.footer')
        </div>
    </div>

    @stack('modals')
    @stack('scripts')

    @livewireScripts
    @livewire('livewire-ui-modal')
</body>

</html>
