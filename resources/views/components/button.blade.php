@props(['disabled' => false, 'outline' => false, 'small' => false])

@isset($href)
    <a
        {{ $attributes }}
        {{ $disabled ? 'disabled' : '' }}
        @class([
            'inline-block relative disabled:cursor-not-allowed disabled:opacity-70',
            'w-full rounded-lg transition hover:opacity-80',
            'border-black bg-white text-black' => $outline,
            'border-rose-500 bg-rose-500 text-white' => ! $outline,
            'border-[1px] py-1 text-sm font-light' => $small,
            'border-2 py-3 text-base font-semibold' => !$small,
        ])
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes }}
        {{ $disabled ? 'disabled' : '' }}
        @class([
            'inline-block relative disabled:cursor-not-allowed disabled:opacity-70',
            'w-full rounded-lg transition hover:opacity-80',
            'border-black bg-white text-black' => $outline,
            'border-rose-500 bg-rose-500 text-white' => ! $outline,
            'border-[1px] py-1 text-sm font-light' => $small,
            'border-2 py-3 text-base font-semibold' => !$small,
        ])
    >
        {{ $slot }}
    </button>
@endif
