@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Softwares</h1>

        <a href="{{ route('softwares.create') }}" class="btn btn-primary mb-3">Nuevo Software</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="assetsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Versión</th>
                <th>Activo TI Asociado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($softwares as $software)
                <tr>
                    <td>{{ $software->id }}</td>
                    <td>{{ $software->nombre }}</td>
                    <td>{{ $software->version }}</td>
                    <td>{{ $software->asset->nombre_equipo ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('softwares.edit', $software->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('softwares.destroy', $software->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar software?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No hay softwares registrados.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
