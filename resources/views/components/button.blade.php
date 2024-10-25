<!-- TODO: Add props for `disabled`, `outline` and `small` -->
@props(['disabled' => false, 'outline' => false, 'small' => false])

<!-- TODO: add `border-black bg-white text-black` classes if outline -->
<!-- TODO: add `border-rose-500 bg-rose-500 text-white` classes unless outline -->
<!-- TODO: add `border-[1px] py-1 text-sm font-light` classes if small -->
<!-- TODO: add `border-2 py-3 text-base font-semibold` classes unless small -->
<button
    {{ $attributes }}
    {{ $disabled ? 'disabled' : '' }}
    @class([
        'relative inline-block w-full rounded-lg transition hover:opacity-80 disabled:cursor-not-allowed disabled:opacity-70',
        'border-rose-500 bg-rose-500 text-white' => $outline,
        'border-rose-500 bg-rose-500 text-white' => !$outline,
        'border-[1px] py-1 text-sm font-light' => $small,
        'border-2 py-3 text-base font-semibold' => !$small,
    ])
>
    <!-- Label -->
    {{ $slot }}
</button>
