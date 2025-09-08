@extends('layouts.app')
@section('title', isset($asset) ? 'Editar Activo' : 'Nuevo Activo')
@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ isset($asset) ? 'Editar Activo' : 'Nuevo Activo' }}</h1>
    <form action="{{ isset($asset) ? route('assets.update',$asset) : route('assets.store') }}" method="POST">
        @csrf
        @if(isset($asset)) @method('PUT') @endif
        <div class="mb-2">
            <label>Nombre del Equipo</label>
            <input type="text" name="nombre_equipo" value="{{ $asset->nombre_equipo ?? old('nombre_equipo') }}" required class="form-control">
        </div>
        <div class="mb-2">
            <label>Tipo</label>
            <select name="tipo" required class="form-control">
                <option value="PC" {{ (isset($asset) && $asset->tipo=='PC') ? 'selected' : '' }}>PC</option>
                <option value="Servidor" {{ (isset($asset) && $asset->tipo=='Servidor') ? 'selected' : '' }}>Servidor</option>
                <option value="Laptop" {{ (isset($asset) && $asset->tipo=='Laptop') ? 'selected' : '' }}>Laptop</option>
            </select>
        </div>
        <div class="mb-2">
            <label>Sistema Operativo</label>
            <input type="text" name="sistema_operativo" value="{{ $asset->sistema_operativo ?? old('sistema_operativo') }}" required class="form-control">
        </div>
        <div class="mb-2">
            <label>Estado</label>
            <select name="estado" required class="form-control">
                <option value="activo" {{ (isset($asset) && $asset->estado=='activo') ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ (isset($asset) && $asset->estado=='inactivo') ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($asset) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
@endsection
