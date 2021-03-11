<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title','To Dos App - Laravel')</title>
</head>
<body>
    @include('partials.NavBar')
    <main class="container mt-4">
        @yield('content')
    </main>
    @include('partials.Footer')

</body>
</html>