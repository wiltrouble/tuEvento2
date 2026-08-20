@extends('layouts.base')

@section('title', 'Categorías')

@section('content')
    <h2>Categorías</h2>

    <p><a class="button" href="{{ url('/categorias/nuevo') }}">Nueva categoría</a></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ url('/categorias/'.$category->id.'/editar') }}">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay categorías.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
