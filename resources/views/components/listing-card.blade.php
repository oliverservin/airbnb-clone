@props(['listing'])

<div {{ $attributes }} class="group relative col-span-1">
    <div class="flex w-full flex-col gap-2">
        <div class="relative aspect-square w-full overflow-hidden rounded-xl bg-neutral-200">
            <!-- Listing photo -->
            <!-- <img
                class="h-full w-full object-cover transition group-hover:scale-110"
                alt="Listing"
            /> -->
        </div>
        <div class="flex flex-row items-center gap-1">
            <div class="font-semibold">$ {{ $listing->price }}</div>
            <div class="font-light">noche</div>
        </div>
    </div>
    <a href="{{ route('listings.show', ['listing' => $listing]) }}" wire:navigate class="absolute inset-0"></a>
</div>
