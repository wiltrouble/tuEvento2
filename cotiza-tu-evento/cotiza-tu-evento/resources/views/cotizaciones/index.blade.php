@extends('layouts.base')

@section('title', 'Cotizaciones')

@section('content')
    @php
        $estados = [
            'pending' => 'Pendiente',
            'approved' => 'Aprobada',
            'rejected' => 'Rechazada',
            'cancelled' => 'Cancelada',
        ];
    @endphp

    <h2>Cotizaciones</h2>

    <p><a class="button" href="{{ url('/cotizaciones/nueva') }}">Nueva cotización</a></p>

    <form method="GET" action="{{ url('/cotizaciones') }}">
        <p>
            <label for="status">Estado</label>
            <select id="status" name="status">
                <option value="">Todos</option>
                <option value="pending" @selected($status === 'pending')>Pendiente</option>
                <option value="approved" @selected($status === 'approved')>Aprobada</option>
                <option value="rejected" @selected($status === 'rejected')>Rechazada</option>
                <option value="cancelled" @selected($status === 'cancelled')>Cancelada</option>
            </select>
            <button type="submit">Filtrar</button>
            <a href="{{ url('/cotizaciones') }}">Quitar filtro</a>
        </p>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha del evento</th>
                <th>Tipo de evento</th>
                <th>Estado</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quotations as $quotation)
                <tr>
                    <td>{{ $quotation->id }}</td>
                    <td>{{ $quotation->client?->name }}</td>
                    <td>{{ $quotation->event_date }}</td>
                    <td>{{ $quotation->event_type }}</td>
                    <td>{{ $estados[$quotation->status] ?? $quotation->status }}</td>
                    <td>{{ $quotation->total }}</td>
                    <td>
                        <a href="{{ url('/cotizaciones/'.$quotation->id) }}">Ver</a>
                        <a href="{{ url('/cotizaciones/'.$quotation->id.'/editar') }}">Editar</a>
                        <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/eliminar') }}">
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay cotizaciones.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
