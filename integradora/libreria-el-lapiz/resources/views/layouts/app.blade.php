<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Librería El Lápiz')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }
        header, footer {
            background: #f0f0f0;
            padding: 16px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Librería El Lápiz</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Integradora - Wilson Lopez - 18 de agosto de 2026 </p>
    </footer>
</body>
</html>
