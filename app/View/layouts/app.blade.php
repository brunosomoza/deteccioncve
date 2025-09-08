<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema CVE')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<nav class="bg-blue-600 p-4 text-white flex justify-between">
    <div>
        <a href="{{ route('home') }}" class="font-bold">SG-CVE</a>
    </div>
    <div>
        @auth
            <span>{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="ml-2 px-3 py-1 bg-red-500 rounded">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="px-3 py-1 bg-green-500 rounded">Login</a>
            <a href="{{ route('register') }}" class="px-3 py-1 bg-yellow-500 rounded">Register</a>
        @endauth
    </div>
</nav>
<div class="container mx-auto mt-8">
    @yield('content')
</div>
</body>
</html>
