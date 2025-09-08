@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del CVE</h1>
        <a href="{{ route('cves.index') }}" class="btn btn-secondary mb-3">Volver</a>

        <table class="table table-bordered">
            <tr><th>ID</th><td>{{ $cve->id }}</td></tr>
            <tr><th>CVE ID</th><td>{{ $cve->cve_id }}</td></tr>
            <tr><th>Descripción</th><td>{{ $cve->descripcion }}</td></tr>
            <tr><th>CVSS</th><td>{{ $cve->cvss }}</td></tr>
            <tr><th>Criticidad</th><td>{{ $cve->criticidad }}</td></tr>
            <tr><th>Creado</th><td>{{ $cve->created_at->format('d-m-Y H:i') }}</td></tr>
            <tr><th>Actualizado</th><td>{{ $cve->updated_at->format('d-m-Y H:i') }}</td></tr>
        </table>
    </div>
@endsection
