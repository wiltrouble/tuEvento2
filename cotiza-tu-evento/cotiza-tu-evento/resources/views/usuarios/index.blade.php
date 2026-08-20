@extends('layouts.base')

@section('title', 'Usuarios')

@section('content')
    <h2>Usuarios</h2>

    <p><a class="button" href="{{ url('/usuarios/nuevo') }}">Nuevo usuario</a></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay usuarios.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
