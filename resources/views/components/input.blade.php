<!-- TODO: Add props for `label`, `disabled` and `hasError` -->
@props(['label', 'disabled' => false, 'hasError' => false])

<div class="relative w-full">
    <!-- TODO: Echo attributes -->
    <!-- TODO: Echo disabled prop -->
    <!-- TODO: Add 'border-rose-500 focus:border-rose-500' classes with error -->
    <!-- TODO: Add 'border-neutral-300 focus:border-black' classes without error -->
    <input
        {{ $attributes }}
        {{ $disabled ? 'disabled' : '' }}
        @class([
            'peer w-full rounded-md border-2 bg-white p-4 pl-4 pt-6 font-light outline-none transition disabled:cursor-not-allowed disabled:opacity-70',
            'border-rose-500 focus:border-rose-500' => $hasError,
            'border-neutral-300 focus:border-black' => !$hasError,
        ])
        placeholder=" "
    />
    <label
        class="text-md absolute left-4 top-5 z-10 origin-[0] -translate-y-3 transform text-zinc-400 duration-150 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-4 peer-focus:scale-75"
    >
        <!-- TODO: echo `label` slot -->
        <!-- Label -->
        {{ $label }}
    </label>
</div>
