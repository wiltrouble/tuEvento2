@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>

    <div class="cards">
        <div class="card">
            <h3>Clientes</h3>
            <p class="count">{{ $clientsCount }}</p>
            <a href="{{ url('/clientes') }}">Ver clientes</a>
        </div>

        <div class="card">
            <h3>Categorías</h3>
            <p class="count">{{ $categoriesCount }}</p>
            <a href="{{ url('/categorias') }}">Ver categorías</a>
        </div>

        <div class="card">
            <h3>Productos</h3>
            <p class="count">{{ $productsCount }}</p>
            <a href="{{ url('/productos') }}">Ver productos</a>
        </div>

        <div class="card">
            <h3>Cotizaciones</h3>
            <p class="count">{{ $quotationsCount }}</p>
            <a href="{{ url('/cotizaciones') }}">Ver cotizaciones</a>
        </div>

        <div class="card">
            <h3>Pendientes</h3>
            <p class="count">{{ $pendingCount }}</p>
            <a href="{{ url('/cotizaciones?status=pending') }}">Ver pendientes</a>
        </div>

        <div class="card">
            <h3>Aprobadas</h3>
            <p class="count">{{ $approvedCount }}</p>
            <a href="{{ url('/cotizaciones?status=approved') }}">Ver aprobadas</a>
        </div>

        <div class="card">
            <h3>Nueva cotización</h3>
            <p>Crear una cotización para un evento.</p>
            <a class="button" href="{{ url('/cotizaciones/nueva') }}">Crear</a>
        </div>

        <div class="card">
            <h3>Cotización rápida</h3>
            <p>Armar una cotización temporal para copiar o enviar por WhatsApp. No se guarda.</p>
            <a class="button" href="{{ url('/cotizaciones/rapida') }}">Crear</a>
        </div>
    </div>
@endsection
