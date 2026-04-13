<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>QN Interview - Service Ticket</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-gray-100 text-gray-800 font-sans h-screen">

    <div class="h-full min-h-screen flex flex-col">

        {{-- Topbar --}}
        <x-topbar />
        {{-- End of topbar --}}

        <div class="flex flex-1 overflow-hidden">

            <!-- SIDEBAR BACKDROP (mobile) -->
            <x-sidebar />
            {{-- End of sidebar --}}

            @yield('content')
        </div>

    </div>

    {{-- Modal --}}
    @yield('modal')
    {{-- End of modal --}}

</body>

</html>
