@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Reportes de Vulnerabilidades <a href="{{ route('reports.pdf') }}" class="btn btn-primary mb-3">Generar PDF </a></h1>



    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Activo</th>
            <th>Software</th>
            <th>CVE</th>
            {{--                <th>CVSS</th>--}}
            <th>Criticidad</th>
            <th>Estado Vulnerabilidad</th>
            <th>Deteccion</th>
            <th>Asset ID</th>
            <th>Asset ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vulnerabilities ?? [] as $vul)
        <tr>
            <td>{{ $vul->id }}</td>
            <td>{{ $vul->asset->nombre_equipo ?? '-' }}</td>
            <td>{{ $vul->software->nombre ?? '-' }}</td>
            <td>{{ $vul->cve->cve_id ?? '-' }}</td>
            {{--                    <td>{{ $vul->cve->cvss ?? '-' }}</td>--}}
            <td>{{ $vul->cve->criticidad ?? '-' }}</td>
            <td>{{ $vul->estado }}</td>
            <td>{{ $vul->fecha_detectada->format('Y-m-d H:i') }}</td>
            <td><a href="{{ route('reports.pdf.idvul',$vul->asset_id) }}" >Generar PDF </a></td>
            <td> {{$vul->asset->count()}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $vulnerabilities->links() }} {{-- Paginación --}}
    </div>
</div>
@endsection
