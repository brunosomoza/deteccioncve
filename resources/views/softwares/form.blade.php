@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">{{ isset($software) ? 'Editar Software' : 'Registrar Software' }}</h1>

    <form action="{{ isset($software) ? route('softwares.update', $software->id) : route('softwares.store') }}" method="POST">
        @csrf
        @if(isset($software))
            @method('PUT')
        @endif

        <div class="mb-2">
            <label>Activo TI</label>
            <select name="asset_id" required class="border p-1 w-full">
                <option value="">Seleccione un activo</option>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}" {{ (isset($software) && $software->asset_id == $asset->id) ? 'selected' : '' }}>
                        {{ $asset->nombre_equipo }} ({{ $asset->tipo }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Nombre del Software</label>
            <input type="text" name="nombre" value="{{ $software->nombre ?? old('nombre') }}" required class="border p-1 w-full">
        </div>

        <div class="mb-2">
            <label>Versión</label>
            <input type="text" name="version" value="{{ $software->version ?? old('version') }}" required class="border p-1 w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-2">
            {{ isset($software) ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>
@endsection
