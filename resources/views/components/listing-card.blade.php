@props(['listing'])

<a
    {{ $attributes }}
    href="{{ route('listings.show', ['listing' => $listing]) }}"
    class="group col-span-1"
    wire:navigate
>
    <div class="flex w-full flex-col gap-2">
        <div class="relative aspect-square w-full overflow-hidden rounded-xl bg-neutral-200">
            @if ($listing->photo_url)
                <img
                    fill
                    class="h-full w-full object-cover transition group-hover:scale-110"
                    src="{{ $listing->photo_url }}"
                    alt="Listing"
                />
            @endif

            <div class="absolute right-3 top-3">
                <!-- botón para favoritear -->
            </div>
        </div>
        <div class="text-lg font-semibold">{{ $listing->country?->region.', '.$listing->country?->name }}</div>
        <div class="font-light text-neutral-500">{{ $listing->category->name }}</div>
        <div class="flex flex-row items-center gap-1">
            <div class="font-semibold">$ {{ $listing->price }}</div>
            <div class="font-light">noche</div>
        </div>
    </div>
</a>
