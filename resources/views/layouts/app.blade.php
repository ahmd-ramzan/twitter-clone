<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }},
            avatar: '{{ optional(auth()->user())->avatar() }}',
        }
    </script>
</head>
<body>
    <div id="app">
        <main class="container mx-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
