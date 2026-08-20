@extends('layouts.base')

@section('title', 'Nueva cotización')

@section('content')
    <h2>Nueva cotización</h2>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ url('/cotizaciones/nueva') }}">
        @csrf


        <p>
            <label for="client_id">Cliente</label><br>
            <select id="client_id" name="client_id">
                <option value="">Seleccione un cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
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
            <button type="submit">Guardar</button>
            <a href="{{ url('/cotizaciones') }}">Cancelar</a>
        </p>
    </form>
@endsection
