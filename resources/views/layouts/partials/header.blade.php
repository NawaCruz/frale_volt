{{-- resources/views/layouts/partials/page-header.blade.php --}}
<div class="px-4 pt-6 bg-slate-200">
    <div class="flex flex-wrap items-center justify-between gap-3">

        {{-- Título + Subtítulo --}}
        <div>
            <p class="text-slate-500 text-sm">
                @yield('page_subtitle', 'Acá va una descripción o subtítulo opcional.')
            </p>
        </div>

    </div>
</div>
