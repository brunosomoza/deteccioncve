<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Vulnerabilidades </title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
<h2>Reporte Historico de Vulnerabilidades generado {{ now() }}</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Activoxxx</th>
        <th>Softwarexxxx</th>
        <th>CVE</th>
        <th>CVSS</th>
        <th>Criticidad</th>
        <th>Estado Vulnerabilidad</th>
        <th>Deteción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vulnerabilities as $vul)
        <tr>
            <td>{{ $vul->id }}</td>
            <td>{{ $vul->asset->nombre_equipo ?? '-' }}</td>
            <td>{{ $vul->software->nombre ?? '-' }}</td>
            <td>{{ $vul->cve->cve_id ?? '-' }}</td>
            <td>{{ $vul->cve->cvss ?? '-' }}</td>
            <td>{{ $vul->cve->criticidad ?? '-' }}</td>
            <td>{{ $vul->estado }}</td>
            <td>{{ $vul->fecha_detectada->format('Y-m-d H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
