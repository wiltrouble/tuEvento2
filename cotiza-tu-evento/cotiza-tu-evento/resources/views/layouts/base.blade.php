<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Cotiza tu evento')</title>
        @fonts
        @vite(['resources/css/app.css'])
        <style>
            h2,
            p {
                margin: 0 0 12px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 16px;
            }

            th,
            td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }

            th {
                background: #f3f3f3;
            }

            .button,
            button,
            input[type="submit"] {
                display: inline-block;
                padding: 6px 12px;
                border: 1px solid #444;
                background: #eee;
                color: #000;
                text-decoration: none;
            }

            form p {
                margin-bottom: 10px;
            }

            input,
            select,
            textarea {
                padding: 6px;
                border: 1px solid #888;
                font-size: 16px;
                background: #fff;
            }

            .cards {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
                margin-bottom: 16px;
            }

            .card {
                border: 1px solid #ccc;
                background: #fff;
                padding: 16px;
                flex: 1 1 180px;
                max-width: 100%;
            }

            .card h3 {
                margin: 0 0 8px 0;
                font-size: 16px;
                font-weight: normal;
                color: #555;
            }

            .card .count {
                margin: 0 0 12px 0;
                font-size: 28px;
            }

            .card p {
                margin: 0 0 12px 0;
            }

            .card a {
                color: #000;
            }

            header .header-auth a,
            header .header-auth button {
                display: inline-block;
                padding: 6px 12px;
                border: 1px solid #94a3b8;
                background: transparent;
                color: #fff;
                text-decoration: none;
            }
        </style>
    </head>
    <body class="flex min-h-screen flex-col bg-slate-50 text-slate-900">
        <header class="bg-slate-900 text-white">
            <div class="mx-auto flex max-w-6xl flex-col gap-3 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h1 class="m-0 text-lg font-semibold sm:text-2xl">Cotiza tu evento</h1>
                    <p class="mt-1 mb-0 hidden text-sm text-slate-300 sm:block">Cotizaciones de renta para eventos</p>
                </div>

                <div class="header-auth">
                    @auth
                        <span class="mr-2 text-sm text-slate-300">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ url('/logout') }}" class="inline">
                            @csrf
                            <button type="submit">Cerrar sesión</button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}">Iniciar sesión</a>
                    @endauth
                </div>
            </div>
        </header>

        <nav class="bg-slate-800 text-white">
            <div class="mx-auto max-w-6xl px-4 py-3 sm:px-6">
                <div class="flex flex-col gap-1 sm:flex-row sm:flex-wrap sm:items-center sm:gap-2">
                    <a
                        href="{{ url('/') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('/') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Inicio
                    </a>
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('dashboard') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Dashboard
                    </a>
                    <a
                        href="{{ url('/clientes') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('clientes*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Clientes
                    </a>
                    <a
                        href="{{ url('/categorias') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('categorias*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Categorías
                    </a>
                    <a
                        href="{{ url('/productos') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('productos*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Productos
                    </a>
                    <a
                        href="{{ url('/cotizaciones') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('cotizaciones*') && ! request()->is('cotizaciones/rapida*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Cotizaciones
                    </a>
                    <a
                        href="{{ url('/cotizaciones/rapida') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('cotizaciones/rapida*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Cotización rápida
                    </a>
                    <a
                        href="{{ url('/usuarios') }}"
                        class="rounded px-3 py-2 text-sm {{ request()->is('usuarios*') ? 'bg-slate-700 font-medium' : 'hover:bg-slate-700' }}"
                    >
                        Usuarios
                    </a>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="mx-auto w-full max-w-6xl flex-1 overflow-x-auto px-4 py-6 sm:px-6">
            @yield('content')
        </main>

        <footer class="bg-slate-900 text-slate-300">
            <div class="mx-auto flex max-w-6xl flex-col gap-1 px-4 py-4 text-sm sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <p class="mb-0">Cotiza tu evento</p>
                <p class="mb-0 text-slate-400">Renta de productos para eventos</p>
            </div>
        </footer>
    </body>
</html>
