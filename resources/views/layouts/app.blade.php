{{-- resources/views/layouts/volt.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" class="h-full"
        x-data="{ openSidebar:false, openUser:false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Dashboard') · {{ config('app.name','Laravel') }}</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    @stack('head') {{-- por si una vista quiere inyectar algo en <head> --}}
</head>

<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    {{-- Overlay móvil --}}
    <div x-show="openSidebar" class="fixed inset-0 z-40 bg-slate-900/40 lg:hidden" @click="openSidebar=false"></div>

    <div class="min-h-screen grid lg:grid-cols-[260px_1fr]">
        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main --}}
        <div class="lg:ml-0">
            {{-- Topbar --}}
            @include('layouts.partials.topbar')

            {{-- Header de página (opcional) --}}
            <div class="px-4 pt-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h1 class="text-2xl font-semibold text-slate-800">
                            @yield('page_title','All Orders')
                        </h1>
                        <p class="text-slate-500 text-sm">
                            @yield('page_subtitle','Your web analytics dashboard template.')
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        @yield('page_actions') {{-- aquí puedes poner botones extra --}}
                        <button class="rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-sky-700">
                            New Plan
                        </button>
                    </div>
                </div>

                {{-- Buscador secundario estilo Volt (opcional) --}}
                @hasSection('secondary_search')
                    @yield('secondary_search')
                @else
                    <div class="mt-5">
                        <label class="relative block">
                            <span class="absolute inset-y-0 left-3 flex items-center">
                                <i data-feather="search" class="h-4 w-4 text-slate-400"></i>
                            </span>
                            <input type="text" placeholder="Search orders"
                                    class="w-full rounded-xl border-slate-200 bg-white pl-10 pr-3 py-2.5 text-sm
                                            focus:border-sky-500 focus:ring-2 focus:ring-sky-200">
                        </label>
                    </div>
                @endif
            </div>

            {{-- CONTENT AREA: libre para ti --}}
            <main class="px-4 py-6">
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
