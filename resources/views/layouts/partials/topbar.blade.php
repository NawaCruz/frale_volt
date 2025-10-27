{{-- resources/views/layouts/partials/_topbar.blade.php --}}
<header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b">
    <div class="flex h-16 items-center gap-3 px-4">
        <button class="lg:hidden p-2 -ml-1" @click="openSidebar=true">
            <i data-feather="menu"></i>
        </button>

        {{-- Breadcrumb + Search --}}
        <div class="flex flex-1 items-center gap-3">
            <nav class="hidden md:flex items-center text-sm text-slate-500">
                <a href="#" class="hover:text-slate-700">Volt</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-slate-700">@yield('section','Transactions')</a>
            </nav>

            <div class="flex-1 max-w-xl">
                <label class="relative block">
                    <span class="absolute inset-y-0 left-3 flex items-center">
                        <i data-feather="search" class="h-4 w-4 text-slate-400"></i>
                    </span>
                    <input type="text" placeholder="Search"
                           class="w-full rounded-xl border-slate-200 bg-slate-50 pl-10 pr-3 py-2.5 text-sm
                                  focus:border-sky-500 focus:bg-white focus:ring-2 focus:ring-sky-200">
                </label>
            </div>
        </div>

        {{-- Acciones rápidas + usuario --}}
        <div class="flex items-center gap-2">
            <button class="rounded-xl border px-3 py-2 text-sm hover:bg-slate-50">Share</button>
            <button class="rounded-xl border px-3 py-2 text-sm hover:bg-slate-50">Export</button>

            <div class="relative">
                <button class="ml-1 inline-flex items-center gap-2 rounded-full border px-2.5 py-1.5 hover:bg-slate-50"
                        @click="openUser = !openUser">
                    <img src="https://i.pravatar.cc/40?img=1" class="h-8 w-8 rounded-full" alt="user">
                    <span class="hidden sm:block text-sm">Bonnie Green</span>
                    <i data-feather="chevron-down" class="h-4 w-4"></i>
                </button>
                <div x-show="openUser" @click.away="openUser=false" x-transition
                     class="absolute right-0 mt-2 w-52 rounded-xl border bg-white p-2 shadow-lg">
                    <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-50">Profile</a>
                    <a href="#" class="block rounded-lg px-3 py-2 text-sm hover:bg-slate-50">Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="w-full text-left rounded-lg px-3 py-2 text-sm hover:bg-slate-50">Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
