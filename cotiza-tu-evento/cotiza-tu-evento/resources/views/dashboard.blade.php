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

    <h3>Teléfono de WhatsApp</h3>
    <p>Este número se usa cuando un cliente comparte una cotización rápida por WhatsApp.</p>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/perfil') }}">
        @csrf

        <p>
            <label for="name">Nombre</label><br>
            <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
        </p>

        <p>
            <label for="phone">Teléfono (WhatsApp)</label><br>
            <input id="phone" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
        </p>

        <p>
            <label for="password">Nueva contraseña (opcional)</label><br>
            <input id="password" type="password" name="password">
        </p>

        <p>
            <button type="submit">Guardar perfil</button>
        </p>
    </form>
@endsection
