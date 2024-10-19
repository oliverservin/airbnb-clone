@props(['icon'])

<div
    class="flex cursor-pointer flex-col items-center justify-center gap-2 border-b-2 border-transparent p-3 text-neutral-500 transition hover:text-neutral-800"
>
    @isset($icon)
        <x-dynamic-component :component="'icon.'.$icon" class="size-[26px]" />
    @endisset

    <div class="text-sm font-medium">
        {{ $slot }}
    </div>
</div>
