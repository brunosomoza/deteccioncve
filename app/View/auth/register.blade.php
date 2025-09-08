@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-12 max-w-md p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Registro de Usuario</h2>

        <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block font-semibold">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full border rounded px-3 py-2 mt-1 @error('name') border-red-500 @enderror">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-semibold">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
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

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block font-semibold">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block font-semibold">Rol</label>
                <select id="role" name="role" required
                        class="w-full border rounded px-3 py-2 mt-1 @error('role') border-red-500 @enderror">
                    <option value="">-- Seleccione Rol --</option>
                    <option value="soporte" {{ old('role') == 'soporte' ? 'selected' : '' }}>Soporte</option>
                    <option value="ciberseguridad" {{ old('role') == 'ciberseguridad' ? 'selected' : '' }}>Ciberseguridad</option>
                </select>
                @error('role')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                    Registrarse
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </form>
    </div>
@endsection
