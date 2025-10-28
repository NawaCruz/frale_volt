{{-- resources/views/layouts/partials/sidebar.blade.php --}}
<aside class="fixed top-0 left-0 h-screen w-64 bg-[#1E293B] text-white shadow-lg transform
                lg:translate-x-0 lg:static lg:w-[260px]">
    <div class="flex h-16 items-center gap-2 px-4 border-b border-white/10">
        <a href="{{ url('/') }}" class="flex items-center gap-2 font-semibold text-white">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-[#F4A261] text-[#0F172A]">V</span>
            <span>Volt Layout</span>
        </a>
    </div>

    {{-- Nav --}}
    <nav class="px-3 py-4 space-y-1 text-[18px]">
        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2
                    {{ request()->routeIs('dashboard')
                        ? 'bg-white/10 text-white'
                        : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <i data-feather="layout" class="h-[18px] w-[18px]"></i>
            <span>Dashboard</span>
        </a>

        {{-- Clientes --}}
        <a
            class="flex items-center gap-3 rounded-lg px-3 py-2
                    {{ request()->routeIs('clientes.*')
                        ? 'bg-white/10 text-white'
                        : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
            <i data-feather="users" class="h-[18px] w-[18px]"></i>
            <span>Clientes</span>
        </a>
    </nav>
</aside>
