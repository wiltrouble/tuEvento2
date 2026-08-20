@extends('layouts.base')

@section('title', 'Cotización rápida')

@section('content')
    <h2>Cotización rápida</h2>

    <p>Esta cotización es temporal. No se guarda en la base de datos. Puede copiarla o enviarla por WhatsApp.</p>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/cotizaciones/rapida') }}">
        @csrf

        <h3>Cliente</h3>

        <p>
            <label for="client_name">Nombre del cliente</label><br>
            <input id="client_name" type="text" name="client_name" value="{{ old('client_name') }}">
        </p>

        <p>
            <label for="phone">Teléfono (WhatsApp)</label><br>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}">
        </p>

        <h3>Información del evento</h3>

        <p>
            <label for="event_date">Fecha del evento</label><br>
            <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}">
        </p>

        <p>
            <label for="event_type">Tipo de evento</label><br>
            <input id="event_type" type="text" name="event_type" value="{{ old('event_type') }}">
        </p>

        <p>
            <label for="event_address">Dirección del evento</label><br>
            <input id="event_address" type="text" name="event_address" value="{{ old('event_address') }}">
        </p>

        <p>
            <label for="notes">Notas</label><br>
            <textarea id="notes" name="notes">{{ old('notes') }}</textarea>
        </p>

        <h3>Productos</h3>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>
                            <input
                                type="number"
                                name="quantities[{{ $product->id }}]"
                                min="0"
                                value="{{ old('quantities.'.$product->id, 0) }}"
                            >
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No hay productos activos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <p>
            <button type="submit">Generar cotización</button>
            <a href="{{ url('/') }}">Cancelar</a>
        </p>
    </form>
@endsection
