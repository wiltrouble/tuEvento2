@extends('layouts.base')

@section('title', 'Nuevo cliente')

@section('content')
    <h2>Nuevo cliente</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/clientes/nuevo') }}">
        @csrf

        <p>
            <label for="name">Nombre</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label for="phone">Teléfono</label><br>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}">
        </p>

        <p>
            <label for="email">Correo</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            <label for="address">Dirección</label><br>
            <input id="address" type="text" name="address" value="{{ old('address') }}">
        </p>

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ url('/clientes') }}">Cancelar</a>
        </p>
    </form>
@endsection
