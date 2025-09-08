@extends('layouts.app')

@section('content')
    <h1>{{ isset($user) ? 'Editar Usuario' : 'Nuevo Usuario' }}</h1>

    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
        @csrf
        @if(isset($user)) @method('PUT') @endif

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="role" class="form-control" required>
                <option value="soporte" {{ isset($user) && $user->role=='soporte' ? 'selected' : '' }}>Soporte</option>
                <option value="ciberseguridad" {{ isset($user) && $user->role=='ciberseguridad' ? 'selected' : '' }}>Ciberseguridad</option>
            </select>
        </div>

        @if(!isset($user))
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        @endif

        <button class="btn btn-success">{{ isset($user) ? 'Actualizar' : 'Registrar' }}</button>
    </form>




@endsection
