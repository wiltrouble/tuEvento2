@extends('layouts.app')

@section('title', 'Nuevo libro')

@section('content')
    <h2>Registrar un libro nuevo</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/libros/nuevo" method="POST">
        @csrf

        <p>
            <label for="titulo">Título del libro</label><br>
            <input type="text" id="titulo" name="titulo">
        </p>

        <p>
            <label for="precio">Precio en Bs</label><br>
            <input type="number" id="precio" name="precio">
        </p>

        <p>
            <button type="submit">Registrar libro</button>
        </p>
    </form>
@endsection
