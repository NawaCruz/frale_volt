{{-- resources/views/layouts/partials/_scripts.blade.php --}}

{{-- Alpine (si no lo tienes en app.js) --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- Feather icons --}}
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        if (window.feather) feather.replace();
    });
</script>

{{-- Stack para scripts de cada vista --}}
@stack('scripts')
