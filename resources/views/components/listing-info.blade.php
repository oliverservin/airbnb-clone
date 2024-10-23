@props(['listing'])

<div
    x-data="{ countries: [], listingCountry: null }"
    x-init="
        fetch(
            'https://cdn.jsdelivr.net/gh/mledoze/countries@master/dist/countries.json',
        )
            .then((response) => response.json())
            .then((data) => {
                countries = data
                listingCountry = countries.find((c) => c.cca2 === @js($listing->location))
            })
    "
    class="col-span-4 flex flex-col gap-8"
>
    <div class="flex flex-col gap-2">
        <div class="flex flex-row items-center gap-2 text-xl font-semibold">
            <div>Hosted by {{ $listing->user->name }}</div>
            <x-avatar />
        </div>
        <div class="flex flex-row items-center gap-4 font-light text-neutral-500">
            <div>{{ $listing->guests }} {{ $listing->guests > 1 ? 'huéspedes' : 'huésped' }}</div>
            <div>{{ $listing->rooms }} {{ $listing->rooms > 1 ? 'habitaciones' : 'habitación' }}</div>
            <div>{{ $listing->bathrooms }} {{ $listing->bathrooms > 1 ? 'baños' : 'baño' }}</div>
        </div>
    </div>
    <hr />
    @if ($listing->category)
        <x-listing-category :category="$listing->category" />
        <hr />
    @endif

    <div class="text-lg font-light text-neutral-500">
        {{ $listing->description }}
    </div>
    <hr />
    <x-map x-model="listingCountry" wire:ignore />
</div>
