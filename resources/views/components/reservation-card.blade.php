@props(['reservation'])

<a
    {{ $attributes }}
    href="{{ route('listings.show', ['listing' => $reservation->listing]) }}"
    class="group col-span-1 cursor-pointer"
    wire:navigate
>
    <div class="flex w-full flex-col gap-2">
        <div class="relative aspect-square w-full overflow-hidden rounded-xl bg-neutral-200">
            @if ($reservation->listing->photo_url)
                <img
                    fill
                    class="h-full w-full object-cover transition group-hover:scale-110"
                    src="{{ $reservation->listing->photo_url }}"
                    alt="Listing"
                />
            @endif

            <div class="absolute right-3 top-3">
                <!-- botón para favoritear -->
            </div>
        </div>
        <div class="text-lg font-semibold">{{ $reservation->listing->country?->region.', '.$reservation->listing->country?->name }}</div>
        <div class="font-light text-neutral-500">
            {{ $reservation->start_date->isoFormat('D MMM YYYY') }} -
            {{ $reservation->end_date->isoFormat('D MMM YYYY') }}
        </div>
        <div class="flex flex-row items-center gap-1">
            <div class="font-semibold">$ {{ $reservation->price }}</div>
        </div>
    </div>
</a>
