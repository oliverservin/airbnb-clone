@isset($href)
    <a {{ $attributes }} class="block px-4 py-3 text-left font-semibold transition hover:bg-neutral-100">
        {{ $slot }}
    </a>
@else
    <button {{ $attributes }} class="block px-4 py-3 text-left font-semibold transition hover:bg-neutral-100">
        {{ $slot }}
    </button>
@endif
