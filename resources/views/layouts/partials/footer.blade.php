{{-- resources/views/layouts/partials/_footer.blade.php --}}
<footer class="border-t bg-white px-4 py-6 text-sm text-slate-500">
    <div class="flex items-center justify-between">
        <div>© {{ date('Y') }} {{ config('app.name','Laravel') }}</div>
        <div class="space-x-4">
            <a href="#" class="hover:text-slate-700">Docs</a>
            <a href="#" class="hover:text-slate-700">Support</a>
        </div>
    </div>
</footer>
