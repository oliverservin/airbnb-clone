@props(['listing'])

<div class="col-span-4 flex flex-col gap-8">
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
    <div class="text-lg font-light text-neutral-500">
        {{ $listing->description }}
    </div>
</div>
