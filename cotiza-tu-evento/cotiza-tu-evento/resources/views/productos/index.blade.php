@extends('layouts.base')

@section('title', 'Productos')

@section('content')
    <h2>Productos</h2>

    <p><a class="button" href="{{ url('/productos/nuevo') }}">Agregar producto</a></p>

    <form method="GET" action="{{ url('/productos') }}">
        <p>
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id">
                <option value="">Todas</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected((string) $categoryId === (string) $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
            <a href="{{ url('/productos') }}">Quitar filtro</a>
        </p>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->active ? 'Sí' : 'No' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay productos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
