<header class="sticky top-0 z-40 bg-slate-200 backdrop-blur">
  <div class="flex h-16 items-center gap-3 px-4">
    {{-- Breadcrumb --}}
    <div class="flex flex-1 items-center gap-2">
      <nav class="hidden md:flex items-center text-sm text-slate-500">
          <a href="{{ route('dashboard') }}" class="hover:text-slate-700">Inicio</a>

          <span class="mx-2 text-slate-400">/</span>

          <span class="hover:text-slate-700">
              {{ ucwords(str_replace(['.', '-'], [' / ', ' '], request()->route()->getName() ?? 'Dashboard')) }}
          </span>
      </nav>
    </div>

    {{-- Acciones + usuario --}}
    <div class="flex items-center gap-2">
      <div class="relative" @keydown.escape.window="openUser=false">
        <button class="ml-1 inline-flex items-center gap-2 rounded-full border px-2.5 py-1.5 hover:bg-slate-50"
                @click="openUser = !openUser" aria-haspopup="menu" :aria-expanded="openUser">
          <img src="https://i.pravatar.cc/40?img=1" class="h-8 w-8 rounded-full" alt="user">
          <span class="hidden sm:block text-sm">Bonnie Green</span>
          <i data-feather="chevron-down" class="h-4 w-4"></i>
        </button>

        {{-- Dropdown del usuario --}}
        <div x-cloak x-show="openUser" x-transition
              @click.outside="openUser=false"
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
