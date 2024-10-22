@props(['listing'])

<div
    x-data="{ countries: [], country: '' }"
    x-init="
        fetch(
            'https://cdn.jsdelivr.net/gh/mledoze/countries@master/dist/countries.json',
        )
            .then((response) => response.json())
            .then((data) => {
                countries = data
                country = countries.find((c) => c.cca2 === @js($listing->location))
            })
    "
>
    <div class="text-2xl font-bold">
        {{ $listing->title }}
    </div>
    <div
        x-text="country ? country.region + ', ' + country.translations.spa?.common || country.name.common : ''"
        class="mt-2 font-light text-neutral-500"
    >
        Region, Country
    </div>
</div>

<div class="relative h-[60vh] w-full overflow-hidden rounded-xl">
    <img src="{{ $listing->photo_url }}" fill class="w-full object-cover" alt="Image" />
    <!-- favoritear -->
</div>
