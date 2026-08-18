<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rental</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">

<div class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-4 py-10 sm:px-6">

    <div class="mb-6 text-center">
        <a href="/" class="inline-block leading-tight">
            <span class="text-xl font-bold text-amber-500">RENTAL</span>
            <span class="block text-xs text-slate-500">GLASSES & DISHES</span>
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 bg-slate-900 px-6 py-4">
            <h1 class="text-lg font-semibold text-white">Login (Owner)</h1>
            <p class="mt-1 text-sm text-slate-400">Acceso al panel de administración</p>
        </div>

        <div class="p-6">

            @if ($errors->any())
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="mb-1 block text-sm font-medium text-slate-700">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="owner@email.com"
                        required
                        autofocus
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                    >
                </div>

                <div class="mb-4">
                    <label for="password" class="mb-1 block text-sm font-medium text-slate-700">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        required
                        class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none focus:ring-1 focus:ring-slate-500"
                    >
                </div>

                <div class="mb-6 flex items-center gap-2">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-500"
                    >
                    <label for="remember" class="text-sm text-slate-600">
                        Recordarme
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-800"
                >
                    Iniciar sesión
                </button>

            </form>

        </div>

    </div>

    <p class="mt-6 text-center text-sm text-slate-500">
        <a href="/" class="hover:text-slate-800">&larr; Volver al inicio</a>
    </p>

</div>

</body>
</html>
