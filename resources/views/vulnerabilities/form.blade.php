@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">{{ isset($vulnerability) ? 'Editar Vulnerabilidad' : 'Registrar Vulnerabilidad' }}</h1>

    <form action="{{ isset($vulnerability) ? route('vulnerabilities.update', $vulnerability->id) : route('vulnerabilities.store') }}" method="POST">
        @csrf
        @if(isset($vulnerability))
            @method('PUT')
        @endif

        <div class="mb-2">
            <label>Activo TI</label>
            <select name="asset_id" required class="form-control">
                <option value="">Seleccione un activo</option>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}" {{ (isset($vulnerability) && $vulnerability->asset_id == $asset->id) ? 'selected' : '' }}>
                        {{ $asset->nombre_equipo }} ({{ $asset->tipo }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Software</label>
            <select name="software_id" required class="form-control">
                <option value="">Seleccione un software</option>
                @foreach($softwares as $software)
                    <option value="{{ $software->id }}" {{ (isset($vulnerability) && $vulnerability->software_id == $software->id) ? 'selected' : '' }}>
                        {{ $software->nombre }} {{ $software->version }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>CVE</label>
            <select name="cve_id" required class="form-control">
                <option value="">Seleccione un CVE</option>
                @foreach($cves as $cve)
                    <option value="{{ $cve->id }}" {{ (isset($vulnerability) && $vulnerability->cve_id == $cve->id) ? 'selected' : '' }}>
                        {{ $cve->cve_id }} - {{ $cve->criticidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Estado</label>
            <select name="estado" required class="form-control">
                @foreach(['pendiente', 'aceptado', 'en remediacion', 'remediado'] as $estado)
                    <option value="{{ $estado }}" {{ (isset($vulnerability) && $vulnerability->estado == $estado) ? 'selected' : '' }}>
                        {{ ucfirst($estado) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Fecha Detectada</label>
            <input type="date" name="fecha_detectada" value="{{ isset($vulnerability) ? $vulnerability->fecha_detectada->format('Y-m-d') : old('fecha_detectada') }}" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($vulnerability) ? 'Actualizar' : 'Guardar' }}
        </button>
    </form>
@endsection
