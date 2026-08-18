<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental - Cristalería & Vajilla</title>
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans text-slate-800 antialiased">

<!-- Navbar -->
<nav class="fixed top-0 z-50 w-full border-b border-slate-800 bg-slate-950/95 backdrop-blur">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4 sm:px-6">

        <a href="/" class="leading-tight">
            <span class="text-lg font-bold text-amber-400">RENTAL</span>
            <span class="block text-xs text-slate-400">GLASSES & DISHES</span>
        </a>

        <ul class="flex flex-wrap items-center gap-4 text-sm text-slate-300 sm:gap-6">
            <li><a href="#inicio" class="hover:text-white">Inicio</a></li>
            <li><a href="#servicios" class="hover:text-white">Servicios</a></li>
            <li><a href="#productos" class="hover:text-white">Productos</a></li>
            <li><a href="#contacto" class="hover:text-white">Contacto</a></li>
        </ul>

        <div class="flex flex-wrap gap-2">
            <a
                href="/login"
                class="rounded-md border border-slate-600 px-3 py-1.5 text-sm text-white hover:bg-slate-800"
            >
                Login (Owner)
            </a>
            <a
                href="/cotizacion"
                class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white hover:bg-amber-600"
            >
                Cotizar Gratis
            </a>
        </div>

    </div>
</nav>

<!-- Hero -->
<section
    id="inicio"
    class="relative flex min-h-[600px] items-center bg-cover bg-center pt-20 text-white"
    style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=1800&q=80');"
>
    <div class="mx-auto max-w-6xl px-4 py-16 sm:px-6">
        <div class="max-w-2xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-amber-400">
                Rental Glasses & Dishes
            </p>
            <h1 class="mt-3 text-4xl font-bold leading-tight sm:text-5xl">
                Elegancia en cada detalle de tu evento
            </h1>
            <p class="mt-4 text-lg text-slate-200">
                Alquilamos cristalería, vajilla y accesorios
                para hacer de tu evento un momento inolvidable.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a
                    href="/cotizacion"
                    class="rounded-md bg-amber-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-600"
                >
                    Cotizar Gratis
                </a>
                <a
                    href="/login"
                    class="rounded-md border border-white px-5 py-2.5 text-sm font-medium text-white hover:bg-white/10"
                >
                    Login (Owner)
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Servicios -->
<section id="servicios" class="bg-white py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">

        <div class="mb-10 max-w-xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-amber-500">
                Nuestros servicios
            </p>
            <h2 class="mt-2 text-3xl font-bold text-slate-900">
                Todo lo que necesitas para tu evento
            </h2>
            <p class="mt-3 text-slate-600">
                Contamos con una amplia variedad de productos
                de alta calidad para bodas, cumpleaños,
                graduaciones, eventos corporativos y más.
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-lg border border-slate-200 bg-white p-6 text-center shadow-sm">
                <div class="mb-3 text-4xl">🥂</div>
                <h3 class="text-lg font-semibold text-slate-900">Cristalería</h3>
                <p class="mt-2 text-sm text-slate-600">
                    Copas, vasos y diferentes tipos
                    de cristalería para cada ocasión.
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-6 text-center shadow-sm">
                <div class="mb-3 text-4xl">🍽️</div>
                <h3 class="text-lg font-semibold text-slate-900">Vajilla</h3>
                <p class="mt-2 text-sm text-slate-600">
                    Platos, fuentes y accesorios
                    para una mesa elegante.
                </p>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-6 text-center shadow-sm">
                <div class="mb-3 text-4xl">✨</div>
                <h3 class="text-lg font-semibold text-slate-900">Accesorios</h3>
                <p class="mt-2 text-sm text-slate-600">
                    Cubiertos, mantelería y otros
                    accesorios para complementar tu evento.
                </p>
            </div>
        </div>

    </div>
</section>

<!-- Galería -->
<section id="productos" class="bg-slate-100 py-16">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">

        <div class="mb-10 text-center">
            <p class="text-sm font-semibold uppercase tracking-wide text-amber-500">
                Para cada ocasión
            </p>
            <h2 class="mt-2 text-3xl font-bold text-slate-900">
                Hacemos especial tu momento
            </h2>
        </div>

        <div class="grid grid-cols-2 gap-3 lg:grid-cols-4">
            <img
                src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=600&q=80"
                alt="Mesa para evento"
                class="h-48 w-full rounded-lg object-cover"
            >
            <img
                src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?auto=format&fit=crop&w=600&q=80"
                alt="Evento"
                class="h-48 w-full rounded-lg object-cover"
            >
            <img
                src="https://images.unsplash.com/photo-1478146896981-b80fe463b330?auto=format&fit=crop&w=600&q=80"
                alt="Vajilla"
                class="h-48 w-full rounded-lg object-cover"
            >
            <img
                src="https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=600&q=80"
                alt="Decoración de evento"
                class="h-48 w-full rounded-lg object-cover"
            >
        </div>

    </div>
</section>

<!-- CTA -->
<section class="bg-slate-900 py-16 text-white">
    <div class="mx-auto flex max-w-6xl flex-col items-start justify-between gap-6 px-4 sm:px-6 lg:flex-row lg:items-center">
        <div>
            <h2 class="text-2xl font-bold">Cotiza tu evento gratis</h2>
            <p class="mt-2 text-slate-300">
                Cuéntanos qué necesitas y calcula el costo
                de tu evento de forma rápida y sencilla.
            </p>
        </div>
        <a
            href="/cotizacion"
            class="rounded-md bg-amber-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-600"
        >
            Cotizar Gratis
        </a>
    </div>
</section>

<!-- Footer -->
<footer id="contacto" class="bg-slate-950 py-12 text-white">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            <div>
                <h3 class="text-lg font-bold text-amber-400">RENTAL</h3>
                <p class="mt-2 text-sm text-slate-400">
                    Cristalería, vajilla y accesorios para
                    hacer de tu evento un momento especial.
                </p>
            </div>

            <div>
                <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide">Enlaces</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="#inicio" class="hover:text-white">Inicio</a></li>
                    <li><a href="#servicios" class="hover:text-white">Servicios</a></li>
                    <li><a href="#productos" class="hover:text-white">Productos</a></li>
                    <li><a href="/cotizacion" class="hover:text-white">Cotizar</a></li>
                </ul>
            </div>

            <div>
                <h4 class="mb-3 text-sm font-semibold uppercase tracking-wide">Contacto</h4>
                <p class="text-sm text-slate-400">📞 +591 70000000</p>
                <p class="mt-1 text-sm text-slate-400">✉️ info@rental.com</p>
                <p class="mt-1 text-sm text-slate-400">📍 Bolivia</p>
            </div>

        </div>

        <hr class="my-8 border-slate-800">

        <p class="text-center text-sm text-slate-500">
            © {{ date('Y') }} Rental Glasses & Dishes. Todos los derechos reservados.
        </p>

    </div>
</footer>

</body>
</html>
