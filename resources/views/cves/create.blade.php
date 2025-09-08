@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear CVE</h1>
        <a href="{{ route('cves.index') }}" class="btn btn-secondary mb-3">Volver</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cves.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cve_id" class="form-label">CVE ID</label>
                <input type="text" name="cve_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="cvss" class="form-label">CVSS</label>
                <input type="number" step="0.1" name="cvss" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="criticidad" class="form-label">Criticidad</label>
                <select name="criticidad" class="form-control" required>
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                    <option value="critica">Crítica</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
