<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Team Biomedica</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-calendar/1.15.0/tui-calendar.min.css">
    <script src="https://uicdn.toast.com/tui-calendar/1.15.0/tui-calendar.min.js" defer></script>

    
    




    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar Navigation -->
        @include('layouts.navigation')

        <!-- Page Content -->
        <div class="flex-1 ml-64">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Main Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
