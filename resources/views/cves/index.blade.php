@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de CVEs</h1>
        <button id="miBoton" class="btn btn-success mb-3">Actualizar</button>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table id="assetsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>CVE ID</th>
                <th>Descripción</th>
                <th>CVSS</th>
                <th>Criticidad</th>
                <th>Acciones</th>
                <th>Publicacion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cves as $cve)
                <tr>
                    <td>{{ $cve->id }}</td>
                    <td>{{ $cve->cve_id }}</td>
                    <td>{{ $cve->descripcion }}</td>
                    <td>{{ $cve->cvss }}</td>
                    <td>{{ $cve->criticidad }}</td>
                    <td>
                        <a href="{{ route('cves.show', $cve->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('cves.edit', $cve->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cves.destroy', $cve->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar CVE?')">Eliminar</button>
                        </form>
                    </td>
                    <td>{{ $cve->publicacion }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>



    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('miBoton').addEventListener('click', function() {
            alert("Las actualizaciones estan programadas!");
            //window.location.href = "/ruta-a-tu-controlador";
        });
    </script>
@endsection
