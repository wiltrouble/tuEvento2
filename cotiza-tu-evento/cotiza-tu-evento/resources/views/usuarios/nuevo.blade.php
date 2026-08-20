@extends('layouts.base')

@section('title', 'Nuevo usuario')

@section('content')
    <h2>Nuevo usuario</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/usuarios/nuevo') }}">
        @csrf

        <p>
            <label for="name">Nombre</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label for="email">Correo electrónico</label><br>
            <input id="email" type="email" name="email" value="{{ old('email') }}">
        </p>

        <p>
            <label for="phone">Teléfono (WhatsApp)</label><br>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}">
        </p>

        <p>
            <label for="password">Contraseña</label><br>
            <input id="password" type="password" name="password">
        </p>

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ url('/usuarios') }}">Cancelar</a>
        </p>
    </form>
@endsection
