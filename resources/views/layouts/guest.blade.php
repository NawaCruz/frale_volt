<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-900">
    <div class="min-h-screen grid lg:grid-cols-[1fr_1fr]">

        {{-- Panel visual Volt --}}
        <section class="hidden lg:flex bg-volt-bg text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-25"
                    style="background:
                    radial-gradient(1200px 600px at -10% 10%, rgba(59,130,246,.35), transparent),
                    radial-gradient(1000px 500px at 110% 90%, rgba(139,92,246,.30), transparent);">
            </div>

            <div class="relative z-10 w-full px-12 xl:px-20 py-10 flex flex-col">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-white/10 grid place-content-center font-bold">FV</div>
                    <span class="text-lg font-semibold tracking-wide">{{ config('app.name') }}</span>
                </div>

                <div class="mt-auto mb-20">
                    <h1 class="text-4xl font-bold leading-tight">Bienvenido de vuelta</h1>
                    <p class="mt-4 text-white/80 max-w-md">
                        Administra tus módulos con una interfaz limpia y rápida.
                        Estadísticas, tablas y widgets, sin ruido.
                    </p>

                    <div class="mt-10 grid grid-cols-2 gap-4 max-w-lg">
                        <div class="rounded-2xl bg-white/10 backdrop-blur p-4 shadow-volt">
                            <p class="text-sm text-white/70">Usuarios</p>
                            <p class="text-2xl font-semibold mt-1">15.3k</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 backdrop-blur p-4 shadow-volt">
                            <p class="text-sm text-white/70">Ingresos</p>
                            <p class="text-2xl font-semibold mt-1">$253k</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Contenido principal (slot del formulario) --}}
        <main class="flex items-center justify-center px-6 sm:px-8">
            <div class="w-full max-w-md">
                {{ $slot }}

                <p class="mt-6 text-center text-xs text-slate-500">
                    © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
                </p>
            </div>
        </main>
    </div>
</body>
</html>
