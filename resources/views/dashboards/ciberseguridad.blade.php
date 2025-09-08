@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Ciberseguridad</h1>
        <hr>
        <p>Bienvenido, {{ auth()->user()->name }}!</p>
    </div>
@endsection
