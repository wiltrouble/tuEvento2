<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Cotización</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">

<div class="mx-auto max-w-4xl px-4 py-10 sm:px-6">

    <div class="mb-6">
        <a href="/" class="text-sm text-slate-500 hover:text-slate-800">&larr; Volver al inicio</a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 bg-slate-900 px-6 py-4">
            <h1 class="text-lg font-semibold text-white">Nueva Cotización</h1>
        </div>

        <div class="p-6">

            <form>

                <h2 class="mb-4 text-base font-semibold text-slate-900">Datos del cliente</h2>

                <div class="mb-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="customer_name" class="mb-1 block text-sm font-medium text-slate-700">
                            Nombre
                        </label>
                        <input
                            type="text"
                            id="customer_name"
                            name="customer_name"
                            placeholder="Nombre del cliente"
                            required
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                        >
                    </div>

                    <div>
                        <label for="phone" class="mb-1 block text-sm font-medium text-slate-700">
                            Teléfono
                        </label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="Ej. 70000000"
                            required
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                        >
                    </div>
                </div>

                <div class="mb-8">
                    <label for="email" class="mb-1 block text-sm font-medium text-slate-700">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="cliente@email.com"
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                    >
                </div>

                <h2 class="mb-4 text-base font-semibold text-slate-900">Datos del evento</h2>

                <div class="mb-8 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="event_date" class="mb-1 block text-sm font-medium text-slate-700">
                            Fecha del evento
                        </label>
                        <input
                            type="date"
                            id="event_date"
                            name="event_date"
                            required
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                        >
                    </div>

                    <div>
                        <label for="event_type" class="mb-1 block text-sm font-medium text-slate-700">
                            Tipo de evento
                        </label>
                        <select
                            id="event_type"
                            name="event_type"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                        >
                            <option value="">Seleccionar...</option>
                            <option value="boda">Boda</option>
                            <option value="cumpleanos">Cumpleaños</option>
                            <option value="graduacion">Graduación</option>
                            <option value="evento_corporativo">Evento corporativo</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>

                <h2 class="mb-4 text-base font-semibold text-slate-900">Productos / Servicios</h2>

                <div class="mb-4 overflow-x-auto rounded-md border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-slate-700">Producto</th>
                                <th class="w-28 px-4 py-3 text-left font-medium text-slate-700">Cantidad</th>
                                <th class="w-36 px-4 py-3 text-left font-medium text-slate-700">Precio</th>
                                <th class="w-36 px-4 py-3 text-left font-medium text-slate-700">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            <tr>
                                <td class="px-4 py-3">
                                    <select class="w-full rounded-md border border-slate-300 px-2 py-1.5 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500">
                                        <option value="">Seleccionar producto</option>
                                        <option value="vaso">Vaso</option>
                                        <option value="plato">Plato</option>
                                        <option value="cubierto">Cubierto</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3">
                                    <input
                                        type="number"
                                        value="1"
                                        min="1"
                                        class="w-full rounded-md border border-slate-300 px-2 py-1.5 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                                    >
                                </td>
                                <td class="px-4 py-3">
                                    <input
                                        type="number"
                                        placeholder="0.00"
                                        step="0.01"
                                        class="w-full rounded-md border border-slate-300 px-2 py-1.5 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                                    >
                                </td>
                                <td class="px-4 py-3">
                                    <input
                                        type="text"
                                        value="Bs 0.00"
                                        readonly
                                        class="w-full rounded-md border border-slate-200 bg-slate-50 px-2 py-1.5 text-sm text-slate-600"
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button
                    type="button"
                    class="mb-8 rounded-md border border-slate-300 px-3 py-1.5 text-sm text-slate-700 hover:bg-slate-50"
                >
                    + Agregar producto
                </button>

                <div class="mb-8 flex justify-end">
                    <div class="w-full max-w-xs space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-600">Subtotal:</span>
                            <strong>Bs 0.00</strong>
                        </div>

                        <div class="flex items-center justify-between gap-3">
                            <label for="discount" class="text-slate-600">Descuento:</label>
                            <div class="flex w-36 overflow-hidden rounded-md border border-slate-300">
                                <span class="bg-slate-50 px-2 py-1.5 text-slate-500">Bs</span>
                                <input
                                    type="number"
                                    id="discount"
                                    value="0"
                                    min="0"
                                    step="0.01"
                                    class="w-full px-2 py-1.5 focus:outline-none"
                                >
                            </div>
                        </div>

                        <hr class="border-slate-200">

                        <div class="flex justify-between text-base font-semibold">
                            <span>Total:</span>
                            <span>Bs 0.00</span>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <label for="notes" class="mb-1 block text-sm font-medium text-slate-700">
                        Observaciones
                    </label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="3"
                        placeholder="Información adicional sobre el evento..."
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                    ></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button
                        type="button"
                        class="rounded-md border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                    >
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        class="rounded-md bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800"
                    >
                        Generar cotización
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
