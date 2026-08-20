@extends('layouts.base')

@section('title', 'Cotización rápida')

@section('content')
    <h2>Cotización rápida</h2>

    <p>Esta cotización es temporal y no se guardó en la base de datos.</p>

    <h3>Información general</h3>

    <p><strong>Cliente:</strong> {{ $clientName }}</p>
    @if ($phone)
        <p><strong>Teléfono:</strong> {{ $phone }}</p>
    @endif
    <p><strong>Fecha del evento:</strong> {{ $eventDate }}</p>
    <p><strong>Tipo de evento:</strong> {{ $eventType }}</p>
    <p><strong>Dirección del evento:</strong> {{ $eventAddress }}</p>
    <p><strong>Notas:</strong> {{ $notes }}</p>

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
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item['unit_price'] }}</td>
                    <td>{{ $item['subtotal'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total</h3>

    <p><strong>Total:</strong> {{ $total }}</p>

    <h3>Copiar o compartir</h3>

    <p>
        <label for="share-text">Texto de la cotización</label><br>
        <textarea id="share-text" rows="12" readonly>{{ $shareText }}</textarea>
    </p>

    <p>
        <button type="button" id="copy-button">Copiar</button>
        <a class="button" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">Compartir por WhatsApp</a>
        <a href="{{ auth()->check() ? url('/cotizaciones/rapida') : url('/') }}">Nueva cotización rápida</a>
    </p>

    <p id="copy-status"></p>

    <script>
        document.getElementById('copy-button').addEventListener('click', function () {
            var text = document.getElementById('share-text').value;
            var status = document.getElementById('copy-status');

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(function () {
                    status.textContent = 'Cotización copiada.';
                }).catch(function () {
                    document.getElementById('share-text').select();
                    document.execCommand('copy');
                    status.textContent = 'Cotización copiada.';
                });
            } else {
                document.getElementById('share-text').select();
                document.execCommand('copy');
                status.textContent = 'Cotización copiada.';
            }
        });
    </script>
@endsection
