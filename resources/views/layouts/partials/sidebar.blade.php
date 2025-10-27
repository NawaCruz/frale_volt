{{-- resources/views/layouts/partials/_sidebar.blade.php --}}
<aside class="fixed inset-y-0 left-0 z-50 w-64 transform bg-white shadow-lg
               lg:shadow-none lg:translate-x-0 lg:static lg:w-[260px]"
       :class="openSidebar ? 'translate-x-0' : '-translate-x-full'" x-transition>
    <div class="flex h-16 items-center gap-2 px-4 border-b">
        <button class="lg:hidden p-2" @click="openSidebar=false">
            <i data-feather="x"></i>
        </button>
        <a href="{{ url('/') }}" class="flex items-center gap-2 font-semibold">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-sky-600 text-white">V</span>
            <span>Volt Layout</span>
        </a>
    </div>

    <nav class="px-3 py-4 space-y-1 text-sm">
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="home" class="h-4 w-4"></i> <span>Volt Overview</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="layout" class="h-4 w-4"></i> <span>Dashboard</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="trello" class="h-4 w-4"></i> <span>Kanban</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="mail" class="h-4 w-4"></i>
            <span class="flex-1">Messages</span>
            <span class="ml-auto inline-flex h-5 min-w-[20px] items-center justify-center rounded-full bg-rose-600 px-1.5 text-xs font-medium text-white">4</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="users" class="h-4 w-4"></i> <span>Users List</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="credit-card" class="h-4 w-4"></i> <span>Transactions</span>
        </a>

        <div class="mt-4 px-3 text-[10px] font-semibold uppercase tracking-wider text-slate-500">Components</div>
        <a href="#" class="mt-1 flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="sliders" class="h-4 w-4"></i> <span>Settings</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="calendar" class="h-4 w-4"></i> <span>Calendar</span>
        </a>
        <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100">
            <i data-feather="map-pin" class="h-4 w-4"></i> <span>Map</span>
        </a>
    </nav>

    <div class="mt-auto hidden lg:block p-4 text-xs text-slate-500">
        <div class="rounded-lg border p-3">
            <div class="font-medium text-slate-700">Storage</div>
            <div class="mt-2 h-2 w-full rounded-full bg-slate-200">
                <div class="h-2 w-2/3 rounded-full bg-sky-600"></div>
            </div>
            <div class="mt-2">66% used</div>
        </div>
    </div>
</aside>
