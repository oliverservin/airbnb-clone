@props(['category'])

<div class="flex flex-col gap-6">
    <div class="flex flex-row items-center gap-4">
        <x-dynamic-component :component="'icon.'.$category->icon" class="size-10 text-neutral-600" />

        <div class="flex flex-col">
            <div class="text-lg font-semibold">{{ $category->label }}</div>
            <div class="font-light text-neutral-500">{{ $category->description }}</div>
        </div>
    </div>
</div>
