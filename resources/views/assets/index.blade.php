@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Activos TI</h1>

        <a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">Nuevo Activo</a>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="assetsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Sistema Operativo</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>CVE</th>
                <th>Software</th>
            </tr>
            </thead>
            <tbody>
            @forelse($assets as $asset)
                <tr>
                    <td>{{ $asset->id }}</td>
                    <td>{{ $asset->nombre_equipo }}</td>
                    <td>{{ $asset->tipo }}</td>
                    <td>{{ $asset->sistema_operativo }}</td>
                    <td>{{ $asset->estado }}</td>
                    <td>
                        <a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar activo?')">Eliminar</button>
                        </form>
                    </td>
                    <td><a href="{{ route('reports.index') }}" class="btn btn-success mb-3">Buscar</a></td>
                    <td><a href="{{ route('softwares.index') }}" class="btn btn-success mb-3">Ver</a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No hay activos registrados.</td></tr>
            @endforelse
            </tbody>
        </table>



    </div>
@endsection

