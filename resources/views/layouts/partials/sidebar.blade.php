{{-- resources/views/layouts/partials/sidebar.blade.php --}}
@php
    $itemBase     = 'relative flex items-center gap-3 rounded-xl px-3 py-2 text-sm font-medium transition-all duration-150';
    $itemActive   = 'text-white bg-[#394150] shadow-[0_2px_8px_rgba(0,0,0,0.35)] ring-1 ring-white/10';
    $itemInactive = 'text-slate-300 hover:bg-white/5 hover:text-white';
@endphp

<aside
    id="sidebarMenu"
    class="fixed inset-y-0 left-0 z-30 flex w-64 flex-col
        bg-[#1F2937] text-slate-100 shadow-lg
        lg:static lg:w-[250px]"
    aria-label="Sidebar"
>
    {{-- Header / Branding estilo Volt --}}
    <div class="flex h-16 items-center border-b border-slate-700 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

            {{-- Icono tipo Volt (rayo) --}}
            <span
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg
                    bg-amber-400 text-[#1F2937] shadow-sm"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    class="h-5 w-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13 3L5 14h5v7l8-11h-5V3z"
                    />
                </svg>
            </span>

            <div class="flex flex-col leading-tight">
                <span class="text-xs font-semibold uppercase tracking-wide text-slate-300">
                    Frale
                </span>
                <span class="text-[15px] font-semibold text-white">
                    Panel de Gestión
                </span>
            </div>
        </a>
    </div>

    {{-- Navegación --}}
    <nav class="flex-1 space-y-1 px-3 py-4 text-[15px]">

        {{-- Dashboard --}}
        <a
            href="{{ route('dashboard') }}"
            class="{{ $itemBase }} {{ request()->routeIs('dashboard') ? $itemActive : $itemInactive }}"
        >
            {{-- Heroicon: Home --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                class="h-5 w-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 9.75L12 4.5l9 5.25M4.5 10.5V19.5A1.5 1.5 0 006 21h3.75v-7.5h4.5V21H18a1.5 1.5 0 001.5-1.5V10.5"
                />
            </svg>
            <span>Dashboard</span>
        </a>

        {{-- Clientes --}}
        <a
            class="{{ $itemBase }} {{ request()->routeIs('clientes.*') ? $itemActive : $itemInactive }}"
        >
            {{-- Heroicon: User Group --}}
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                class="h-5 w-5"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M18 18.75a3.75 3.75 0 00-7.5 0m7.5 0V21h-7.5v-2.25m7.5 0A3 3 0 0021 15.75V15a3 3 0 00-3-3h-.75m-7.5 6.75A3.75 3.75 0 003 18.75m7.5 0V21H3v-2.25m7.5 0A3 3 0 018.25 15.75H7.5A3 3 0 014.5 12.75v-.75a3 3 0 013-3h.75m3.75 3.75a3 3 0 003-3V8.25a3 3 0 00-3-3h-.75a3 3 0 00-3 3V9a3 3 0 003 3zm0 0h.75a3 3 0 013 3"
                />
            </svg>
            <span>Clientes</span>
        </a>

        {{-- Más items aquí --}}
    </nav>
</aside>
