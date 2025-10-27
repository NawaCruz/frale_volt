<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900" x-data="{ open: false }">
    <div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside
        class="fixed inset-y-0 left-0 z-40 w-64 shrink-0 bg-volt-bg text-white shadow-lg lg:static lg:translate-x-0
                transform transition-transform duration-200"
        :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <div class="h-16 flex items-center gap-3 px-4 border-b border-white/10">
        <div class="h-9 w-9 rounded-xl bg-white/10 grid place-content-center font-bold">FV</div>
        <span class="font-semibold tracking-wide">{{ config('app.name') }}</span>
        </div>

        <nav class="px-2 py-4 space-y-1 text-sm/6 text-white/80">
        <a href="{{ url('/dashboard') }}" class="block rounded-lg px-3 py-2 hover:bg-white/10">Dashboard</a>
        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/10">Mensajes</a>
        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/10">Usuarios</a>
        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/10">Transacciones</a>
        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/10">Reportes</a>
        <a href="#" class="block rounded-lg px-3 py-2 hover:bg-white/10">Ajustes</a>
        </nav>

        <div class="mt-auto p-4 text-xs text-white/60 hidden lg:block">
        © {{ date('Y') }} {{ config('app.name') }}
        </div>
    </aside>

    {{-- CONTENT WRAPPER --}}
    <div class="flex-1 lg:ml-0 ml-0">

        {{-- TOPBAR --}}
        <header class="sticky top-0 z-30 h-16 bg-white/90 backdrop-blur border-b border-slate-200">
        <div class="h-full mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-3">
            <button class="lg:hidden rounded-md p-2 hover:bg-slate-100" @click="open = !open" aria-label="Abrir menú">
                <!-- icono hamburguesa -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="font-semibold hidden lg:block">{{ config('app.name') }}</span>
            </div>

            <div class="flex items-center gap-3">
            <button class="rounded-full p-2 hover:bg-slate-100" aria-label="Notificaciones">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75V14l-2 3h9z"/>
                </svg>
            </button>
            <div class="h-8 w-8 rounded-full bg-slate-200"></div>
            </div>
        </div>

        @isset($header)
            <div class="bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
                {{ $header }}
            </div>
            </div>
        @endisset
        </header>

        {{-- MAIN --}}
        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
        {{ $slot }}
        </main>
    </div>
    </div>
</body>
</html>
