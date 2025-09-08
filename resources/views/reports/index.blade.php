@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Reportes de Vulnerabilidades <a href="{{ route('reports.pdf') }}" class="btn btn-primary mb-3">Generar PDF </a></h1>



        <table id="assetsTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del equipo</th>
                <th>Tipo</th>
                <th>Sistema Operativo</th>
                <th>Estado</th>
                <th># CVE</th>
                <th># Ver Reporte</th>
            </tr>
            </thead>
            <tbody>
            @foreach($assets ?? [] as $asset)
                <tr>
                    <td>{{ $asset->id }}</td>
                    <td>{{ $asset->nombre_equipo }}</td>
                    <td>{{ $asset->tipo }}</td>
                    <td>{{ $asset->sistema_operativo }}</td>
                    <td>{{ $asset->estado }}</td>
                    <td>{{ $asset->vulnerabilities_count }}</td>
                    <th><a href="{{ route('reports.pdf.idvul',$asset->id) }}" >Generar PDF </a></th>
                </tr>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
