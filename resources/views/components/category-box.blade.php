@props(['category'])

<a
    href="{{ route('home', ['category' => $category->slug] + request()->only('country', 'guests', 'rooms', 'bathrooms', 'startDate', 'endDate')) }}"
    wire:navigate
    @class([
        'flex cursor-pointer flex-col items-center justify-center gap-2 border-b-2 p-3 transition hover:text-neutral-800',
        'border-neutral-800 text-neutral-800' => request()->input('category') === $category->slug,
        'border-transparent text-neutral-500' => request()->input('category') !== $category->slug,
    ])
>
    <x-dynamic-component :component="'icon.'.$category->icon" class="size-[26px]" />

    <div class="text-sm font-medium">{{ $category->name }}</div>
</a>
