@extends('layouts.base')

@section('title', 'Clientes')

@section('content')
    <h2>Clientes</h2>

    <p><a class="button" href="{{ url('/clientes/nuevo') }}">Nuevo cliente</a></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay clientes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
