@props(['icon'])

<div>
    <input type="radio" {{ $attributes }} class="hidden" />
    <button
        type="button"
        @click="$wire.category = @js($attributes->get('value'))"
        class="flex w-full cursor-pointer flex-col gap-3 rounded-xl border-2 p-4 transition hover:border-black"
        :class="$wire.category === @js($attributes->get('value')) ? 'border-black' : 'border-neutral-200'"
    >
        @isset($icon)
            <x-dynamic-component :component="'icon.'.$icon" class="size-[30px]" />
        @endisset

        <div class="font-semibold">
            {{ $slot }}
        </div>
    </button>
</div>
