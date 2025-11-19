{{-- resources/views/layouts/volt.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Dashboard') · {{ config('app.name','Laravel') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>[x-cloak]{ display:none !important; }</style>
    @stack('head') {{-- por si una vista quiere inyectar algo en <head> --}}
</head>

<body class="min-h-screen bg-slate-200 text-slate-900 antialiased"
    x-data="{ openSidebar: false, openUser: false }">

    <div class="min-h-screen grid lg:grid-cols-[260px_1fr]">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main --}}
        <div class="lg:ml-0">
            {{-- Topbar --}}
            @include('layouts.partials.topbar')

            {{-- Page Header (nuevo partial) --}}
            @include('layouts.partials.header')

            {{-- CONTENT AREA: libre para ti --}}
            <main class="px-4 py-8 bg-white shadow-sm rounded-lg mt-4">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.partials.footer')
        </div>
    </div>

    {{-- Scripts comunes (Alpine, Feather, stacks) --}}
    @include('layouts.partials.scripts')
</body>
</html>
