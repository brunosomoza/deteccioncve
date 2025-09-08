@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar CVE</h1>
        <a href="{{ route('cves.index') }}" class="btn btn-secondary mb-3">Volver</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('cves.update', $cfe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="cve_id" class="form-label">CVE ID</label>
                <input type="text" name="cve_id" class="form-control" value="{{ $cfe->cve_id }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required>{{ $cfe->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="cvss" class="form-label">CVSS</label>
                <input type="number" step="0.1" name="cvss" class="form-control" value="{{ $cfe->cvss }}" required>
            </div>
            <div class="mb-3">
                <label for="criticidad" class="form-label">Criticidad</label>
                <select name="criticidad" class="form-control" required>
                    <option value="baja" {{ $cfe->criticidad == 'baja' ? 'selected' : '' }}>Baja</option>
                    <option value="media" {{ $cfe->criticidad == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="alta" {{ $cfe->criticidad == 'alta' ? 'selected' : '' }}>Alta</option>
                    <option value="critica" {{ $cfe->criticidad == 'critica' ? 'selected' : '' }}>Crítica</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
