@extends('layouts.base')

@section('title', 'Editar categoría')

@section('content')
    <h2>Editar categoría</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/categorias/'.$category->id.'/editar') }}">
        @csrf

        <p>
            <label for="name">Nombre</label><br>
            <input id="name" type="text" name="name" value="{{ old('name', $category->name) }}">
        </p>

        <p>
            <label for="description">Descripción</label><br>
            <input id="description" type="text" name="description" value="{{ old('description', $category->description) }}">
        </p>

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ url('/categorias') }}">Cancelar</a>
        </p>
    </form>
@endsection
