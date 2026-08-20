@extends('layouts.base')

@section('title', 'Nuevo producto')

@section('content')
    <h2>Nuevo producto</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/productos/nuevo') }}">
        @csrf

        <p>
            <label for="name">Nombre</label><br>
            <input id="name" type="text" name="name" value="{{ old('name') }}">
        </p>

        <p>
            <label for="description">Descripción</label><br>
            <input id="description" type="text" name="description" value="{{ old('description') }}">
        </p>

        <p>
            <label for="category_id">Categoría</label><br>
            <select id="category_id" name="category_id">
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="stock_quantity">Cantidad en stock (opcional)</label><br>
            <input id="stock_quantity" type="number" name="stock_quantity" min="0" value="{{ old('stock_quantity') }}">
        </p>

        <p>
            <label for="price">Precio</label><br>
            <input id="price" type="number" name="price" min="0" value="{{ old('price') }}">
        </p>

        <p>
            <label>
                <input type="checkbox" name="active" value="1" @checked(old('active', true))>
                Activo
            </label>
        </p>

        <p>
            <button type="submit">Guardar</button>
            <a href="{{ url('/productos') }}">Cancelar</a>
        </p>
    </form>
@endsection
