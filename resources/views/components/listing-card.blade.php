@props(['listing'])

<div {{ $attributes }} class="group relative col-span-1">
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

            <div class="absolute right-3 top-3 z-10">
                <button wire:click="toggleFavorite({{ $listing->id }})">
                    <x-icon.heart @class([
                        'size-6',
                        'fill-neutral-500/70' => !auth()->user()->favorites->contains($listing),
                        'fill-rose-500' => auth()->user()->favorites->contains($listing),
                    ]) />
                </button>
            </div>
        </div>
        <div class="text-lg font-semibold">{{ $listing->country?->region.', '.$listing->country?->name }}</div>
        <div class="font-light text-neutral-500">{{ $listing->category->name }}</div>
        <div class="flex flex-row items-center gap-1">
            <div class="font-semibold">$ {{ $listing->price }}</div>
            <div class="font-light">noche</div>
        </div>
    </div>
    <a href="{{ route('listings.show', ['listing' => $listing]) }}" wire:navigate class="absolute inset-0"></a>
</div>
