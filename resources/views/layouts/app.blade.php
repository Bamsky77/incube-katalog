<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IncubeShop - Katalog Aset Teknologi')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-white">
    @include('partials.navbar')

    <main>
        @if(session('success'))
            <div class="container mt-8">
                <div class="bg-indigo-50 border border-indigo-100 text-indigo-700 px-6 py-4 rounded-xl relative shadow-sm" role="alert">
                    <span class="block sm:inline font-bold">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    @include('partials.footer')
    
    @yield('scripts')
</body>
</html>
