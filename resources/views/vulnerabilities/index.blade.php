@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Vulnerabilidades Detectadas</h1>

        <a href="{{ route('vulnerabilities.create') }}" class="btn btn-primary mb-3">Nueva Vulnerabilidad</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table id="assetsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID Vul</th>
                <th>Activo TI</th>
                <th>Software</th>
                <th>CVE</th>
                <th>Estado</th>
                <th>Fecha Detectada</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($vulnerabilities as $vulnerability)
                <tr>
                    <td>{{ $vulnerability->id }}</td>
                    <td>{{ $vulnerability->asset->nombre_equipo ?? 'N/A' }}</td>
                    <td>{{ $vulnerability->software->nombre ?? 'N/A' }}</td>
                    <td>{{ $vulnerability->cve->cve_id ?? 'N/A' }}</td>
                    <td>{{ ucfirst($vulnerability->estado) }}</td>
                    <td>{{ $vulnerability->fecha_detectada }}</td>
                    <td>
                        <a href="{{ route('vulnerabilities.edit', $vulnerability->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('vulnerabilities.destroy', $vulnerability->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar vulnerabilidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">No hay vulnerabilidades registradas.</td></tr>
            @endforelse
            </tbody>
        </table>



    </div>
@endsection
