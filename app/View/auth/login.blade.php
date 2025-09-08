@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-12 max-w-md p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>

        @if(session('status'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-semibold">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full border rounded px-3 py-2 mt-1 @error('email') border-red-500 @enderror">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block font-semibold">Contraseña</label>
                <input id="password" type="password" name="password" required
                       class="w-full border rounded px-3 py-2 mt-1 @error('password') border-red-500 @enderror">
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="font-semibold">Recordarme</label>
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Iniciar Sesión
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">¿No tienes cuenta? Regístrate</a>
            </div>
        </form>
    </div>
@endsection
