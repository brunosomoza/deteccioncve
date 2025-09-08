<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Vulnerabilidades  </title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

<table>
    <tr>
        <td><img src="{{storage_path('app/public/logo-wardia.png')}}" width="64" style="vertical-align:middle" height="64" alt="Wardia logo"></td>
        <td class="second"><h2>SISTEMA WEB PARA LA DETECCION DE VULNERABILIDADES CVE</h2></td>
    </tr>
</table>
<br>
<h2>Informe del activo [ {{ $asset }} ] a las {{ now() }}</h2>
<p style="font-size: 13px; color: black;" >Este documento informa sobre los resultados de un análisis de seguridad automático, la información es para uso internos de la empresa, de acuerdo a las politicas y lineamientos de seguridad y privacidad.</p>
<h2>Lista de de vulnerabilidades CVE publicas identificadas:</h2>
<table>
    <thead>
    <tr>
        <th>Software</th>
        <th>CVE</th>
        <th>Criticidad</th>
        <th>Estado</th>
        <th>Detección</th>
        <th>Descripción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vulnerabilities as $vul)
        <tr>
            <td>{{ $vul->software->nombre ?? '-' }}</td>
            <td>{{ $vul->cve->cve_id ?? '-' }}</td>
            <td>{{ $vul->cve->criticidad ?? '-' }}</td>
            <td>{{ $vul->estado }}</td>
            <td>{{ $vul->fecha_detectada->format('Y-m-d') }}</td> //Y-m-d H:i
            <th>{{ $vul->cve->descripcion }}</th>
        </tr>
    @endforeach
    </tbody>
</table>
<br><br><br>
<hr>
<p>Cuenta de usuario : {{ auth()->user()->name }}, con rol : {{ auth()->user()->role   }}</p>
</body>
</html>
