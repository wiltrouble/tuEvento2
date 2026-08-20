@extends('layouts.base')

@section('title', $needsAdmin ? 'Crear administrador' : 'Iniciar sesión')

@section('content')
    <div class="card" style="max-width: 420px; margin: 24px auto;">
        @if ($needsAdmin)
            <h2>Crear administrador</h2>
            <p>Aún no hay usuarios. Cree el administrador de la aplicación. Su teléfono se usará para WhatsApp.</p>

            @if ($errors->registro->any())
                <ul>
                    @foreach ($errors->registro->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/registro') }}">
                @csrf

                <p>
                    <label for="admin_name">Nombre</label><br>
                    <input id="admin_name" class="w-full" type="text" name="name" value="{{ old('name') }}">
                </p>

                <p>
                    <label for="admin_email">Correo electrónico</label><br>
                    <input id="admin_email" class="w-full" type="email" name="email" value="{{ old('email') }}">
                </p>

                <p>
                    <label for="admin_phone">Teléfono (WhatsApp)</label><br>
                    <input id="admin_phone" class="w-full" type="text" name="phone" value="{{ old('phone') }}">
                </p>

                <p>
                    <label for="admin_password">Contraseña</label><br>
                    <input id="admin_password" class="w-full" type="password" name="password">
                </p>

                <p>
                    <button type="submit">Crear administrador</button>
                </p>
            </form>
        @else
            <h2>Iniciar sesión</h2>
            <p>Acceso para el administrador de la aplicación.</p>

            @if ($errors->login->any())
                <ul>
                    @foreach ($errors->login->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <p>
                    <label for="email">Correo electrónico</label><br>
                    <input id="email" class="w-full" type="email" name="email" value="{{ old('email') }}">
                </p>

                <p>
                    <label for="password">Contraseña</label><br>
                    <input id="password" class="w-full" type="password" name="password">
                </p>

                <p>
                    <button type="submit">Entrar</button>
                </p>
            </form>
        @endif

        <p><a href="{{ url('/') }}">Volver al inicio</a></p>
    </div>
@endsection
