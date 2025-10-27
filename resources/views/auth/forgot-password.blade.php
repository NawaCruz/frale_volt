<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login — {{ config('app.name', 'Laravel') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-900">

  <div class="min-h-screen grid lg:grid-cols-[28rem_1fr]">
    {{-- Panel visual (solo en lg+) --}}
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

    {{-- FORM --}}
    <main class="flex items-center justify-center px-6 sm:px-8 py-8">
      <div class="w-full max-w-md">
        <div class="mb-8 text-center lg:text-left">
          <h2 class="text-2xl font-bold text-slate-900">Iniciar sesión</h2>
          <p class="mt-2 text-sm text-slate-600">Accede a tu panel de control</p>
        </div>

        <div class="rounded-2xl bg-white shadow-volt p-6 sm:p-8">
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
              <x-input-label for="email" :value="__('Correo electrónico')" />
              <x-text-input id="email" class="block mt-1 w-full"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div class="space-y-1">
              <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Contraseña')" />
                @if (Route::has('password.request'))
                  <a class="text-sm font-medium text-volt-brand hover:underline"
                     href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                  </a>
                @endif
              </div>

              <x-text-input id="password" class="block mt-1 w-full"
                type="password" name="password" required autocomplete="current-password" />
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Remember --}}
            <label class="inline-flex items-center gap-2">
              <input id="remember_me" type="checkbox" name="remember"
                class="rounded border-slate-300 text-volt-brand focus:ring-volt-brand" />
              <span class="text-sm text-slate-700">{{ __('Recuérdame') }}</span>
            </label>

            {{-- Submit --}}
            <button
              class="w-full inline-flex items-center justify-center rounded-xl bg-volt-brand px-4 py-2.5 text-white font-semibold hover:brightness-95 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-volt-brand">
              {{ __('Entrar') }}
            </button>
          </form>

          {{-- Divider --}}
          <div class="flex items-center gap-4 my-6">
            <div class="h-px bg-slate-200 w-full"></div>
            <span class="text-xs uppercase text-slate-400 tracking-wider">o</span>
            <div class="h-px bg-slate-200 w-full"></div>
          </div>

          {{-- Link de registro --}}
          @if (Route::has('register'))
            <p class="text-center text-sm text-slate-600">
              ¿No tienes cuenta?
              <a class="font-semibold text-volt-brand hover:underline" href="{{ route('register') }}">
                Crea una ahora
              </a>
            </p>
          @endif
        </div>

        <p class="mt-6 text-center text-xs text-slate-500">
          © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        </p>
      </div>
    </main>
  </div>
</body>
</html>
