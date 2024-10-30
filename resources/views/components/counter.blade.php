<div x-data="" {{ $attributes }} class="flex flex-row items-center justify-between">
    {{ $slot }}
    <div class="flex flex-row items-center gap-4">
        <button
            type="button"
            class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-[1px] border-neutral-400 text-neutral-600 transition hover:opacity-80"
        >
            <x-icon.minus class="size-4" />
        </button>
        <div x-text="count" class="text-xl font-light tabular-nums text-neutral-600">

        </div>
        <button
            type="button"
            @click="count++"
            class="flex h-10 w-10 cursor-pointer items-center justify-center rounded-full border-[1px] border-neutral-400 text-neutral-600 transition hover:opacity-80"
        >
            <x-icon.plus class="size-4" />
        </button>
    </div>
</div>
