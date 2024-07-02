{{-- @if (session('status')) --}}
@if (session()->has('status'))
    <div id="flash-message" class="fixed bottom-2 right-2 bg-main-600 rounded-3xl px-20 py-2">
        <span class="font-bold text-h4 text-egg">{{ session('status') }}</span>
    </div>
@endif
