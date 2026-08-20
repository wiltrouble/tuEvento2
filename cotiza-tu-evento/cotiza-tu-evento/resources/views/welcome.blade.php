@extends('layouts.base')

@section('title', 'Cotiza tu evento')

@section('content')
    <section>
        <h2>Cotización rápida</h2>
        <p>Arme una cotización temporal. No se guarda. Al compartir por WhatsApp se envía al teléfono del administrador.</p>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/cotizaciones/rapida') }}">
            @csrf

            <p>
                <label for="client_name">Su nombre</label><br>
                <input id="client_name" class="w-full max-w-md" type="text" name="client_name" value="{{ old('client_name') }}">
            </p>

            <p>
                <label for="phone">Su teléfono</label><br>
                <input id="phone" class="w-full max-w-md" type="text" name="phone" value="{{ old('phone') }}">
            </p>

            <p>
                <label for="event_date">Fecha del evento</label><br>
                <input id="event_date" type="date" name="event_date" value="{{ old('event_date') }}">
            </p>

            <p>
                <label for="event_type">Tipo de evento</label><br>
                <input id="event_type" class="w-full max-w-md" type="text" name="event_type" value="{{ old('event_type') }}">
            </p>

            <p>
                <label for="event_address">Dirección del evento</label><br>
                <input id="event_address" class="w-full max-w-md" type="text" name="event_address" value="{{ old('event_address') }}">
            </p>

            <p>
                <label for="notes">Notas</label><br>
                <textarea id="notes" class="w-full max-w-md" name="notes">{{ old('notes') }}</textarea>
            </p>

            <h3>Productos</h3>

            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
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
                            <td colspan="3">No hay productos activos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <p>
                <button type="submit">Generar cotización</button>
            </p>
        </form>
    </section>
@endsection
