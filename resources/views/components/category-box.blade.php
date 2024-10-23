@props(['category'])

<a
    href="{{ route('home', ['category' => $category->label])  }}"
    wire:navigate
    class="flex cursor-pointer flex-col items-center justify-center gap-2 border-b-2 border-transparent p-3 text-neutral-500 transition hover:text-neutral-800"
>
    <x-dynamic-component :component="'icon.'.$category->icon" class="size-[26px]" />

    <div class="text-sm font-medium">
        {{ $category->label }}
    </div>
</a>
