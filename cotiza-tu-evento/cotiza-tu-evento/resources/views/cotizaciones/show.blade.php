@extends('layouts.base')

@section('title', 'Cotización '.$quotation->id)

@section('content')
    @php
        $estados = [
            'pending' => 'Pendiente',
            'approved' => 'Aprobada',
            'rejected' => 'Rechazada',
            'cancelled' => 'Cancelada',
        ];
    @endphp

    <h2>Cotización {{ $quotation->id }}</h2>

    <p>
        <a href="{{ url('/cotizaciones') }}">Volver a cotizaciones</a>
        <a class="button" href="{{ url('/cotizaciones/'.$quotation->id.'/editar') }}">Editar</a>
    </p>

    <h3>Información general</h3>

    <p><strong>Número de cotización:</strong> {{ $quotation->id }}</p>
    <p><strong>Cliente:</strong> {{ $quotation->client?->name }}</p>
    <p><strong>Fecha del evento:</strong> {{ $quotation->event_date }}</p>
    <p><strong>Tipo de evento:</strong> {{ $quotation->event_type }}</p>
    <p><strong>Dirección del evento:</strong> {{ $quotation->event_address }}</p>
    <p><strong>Notas:</strong> {{ $quotation->notes }}</p>
    <p><strong>Estado:</strong> {{ $estados[$quotation->status] ?? $quotation->status }}</p>

    <h3>Cambiar estado</h3>

    <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/pendiente') }}">
        @csrf
        <button type="submit">Pendiente</button>
    </form>

    <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/aprobada') }}">
        @csrf
        <button type="submit">Aprobada</button>
    </form>

    <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/rechazada') }}">
        @csrf
        <button type="submit">Rechazada</button>
    </form>

    <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/cancelada') }}">
        @csrf
        <button type="submit">Cancelada</button>
    </form>

    <h3>Productos</h3>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($quotation->quotationItems as $item)
                <tr>
                    <td>{{ $item->product?->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>{{ $item->subtotal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay productos en esta cotización.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Totales</h3>

    <p><strong>Subtotal:</strong> {{ $quotation->subtotal }}</p>
    <p><strong>Descuento:</strong> {{ $quotation->discount }}</p>
    <p><strong>Total:</strong> {{ $quotation->total }}</p>

    <form method="POST" action="{{ url('/cotizaciones/'.$quotation->id.'/eliminar') }}">
        @csrf
        <button type="submit">Eliminar cotización</button>
    </form>
@endsection
