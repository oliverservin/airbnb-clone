@props(['listing'])

<div>
    <div class="text-2xl font-bold">
        {{ $listing->title }}
    </div>
    <div class="mt-2 font-light text-neutral-500">{{ $listing->country?->region.', '.$listing->country?->name }}</div>
</div>

<div class="relative h-[60vh] w-full overflow-hidden rounded-xl bg-neutral-200">
    @if ($listing->photo_url)
        <img src="{{ $listing->photo_url }}" fill class="w-full object-cover" alt="Image" />
    @endif

    <!-- favoritear -->
</div>
