@props(['disabled' => false, 'hasError' => false, 'label'])

<div class="relative w-full">
    <x-icon.dollar class="absolute left-2 top-5 size-6 text-neutral-700" />
    <input
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes }}
        placeholder=" "
        @class([
            'peer w-full rounded-md border-2 bg-white p-4 pl-9 pt-6 font-light',
            'outline-none transition disabled:cursor-not-allowed disabled:opacity-70',
            'border-rose-500 focus:border-rose-500' => $hasError,
            'border-neutral-300 focus:border-black' => ! $hasError,
        ])
    />
    <label
        class="text-md absolute left-9 top-5 z-10 origin-[0] -translate-y-3 transform text-zinc-400 duration-150 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-4 peer-focus:scale-75"
    >
        {{ $label }}
    </label>
</div>
