<div
    {{ $attributes }}
    x-data="{ count: 1 }"
    x-modelable="count"
    class="flex flex-row items-center justify-between"
>
    {{ $slot }}
    <div class="flex flex-row items-center gap-4">
        <button
            type="button"
            @click="if (count !== 1) count = count - 1"
            class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-[1px] border-neutral-400 text-neutral-600 transition hover:opacity-80"
        >
            <x-icon.minus class="size-4" />
        </button>
        <div class="text-xl font-light tabular-nums text-neutral-600" x-text="count"></div>
        <button
            type="button"
            @click="count = count + 1"
            class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-[1px] border-neutral-400 text-neutral-600 transition hover:opacity-80"
        >
            <x-icon.plus class="size-4" />
        </button>
    </div>
</div>
