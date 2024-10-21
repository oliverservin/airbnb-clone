@props(['listing'])

<a
    {{ $attributes }}
    class="group col-span-1 cursor-pointer"
    x-data="{ countries: [], country: '' }"
    x-init="
        fetch('https://cdn.jsdelivr.net/gh/mledoze/countries@master/dist/countries.json')
            .then((response) => response.json())
            .then((data) => {
                countries = data;
                country = countries.find(c => c.cca2 === @js($listing->location));
            })
    "
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
        <div
            class="text-lg font-semibold"
            x-text="country ? (country.region + ', ' + country.name.common) : ''"
        ></div>
        <div class="font-light text-neutral-500">{{ $listing->category }}</div>
        <div class="flex flex-row items-center gap-1">
            <div class="font-semibold">$ {{ $listing->price }}</div>
            <div class="font-light">night</div>
        </div>
    </div>
</a>
