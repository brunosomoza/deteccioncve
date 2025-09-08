<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Vulnerabilidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- JS de DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#assetsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10,
                "columnDefs": [
                    { "orderable": false, "targets": 2 } // Desactiva ordenamiento en la columna Acciones
                ]
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">DETECCIÓN DE VULNERABILIDADES CVE</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Usuarios |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('assets.index') }}">Activos |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('softwares.index') }}">softwares |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cves.index') }}">Base Datos CVEs |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('vulnerabilities.index') }}">Vulnerabilidades |</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reports.index') }}">Reportes|</a></li>

                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout ({{ auth()->user()->name }}) X</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
