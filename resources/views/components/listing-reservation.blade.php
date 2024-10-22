@props(['listing'])

<div class="overflow-hidden rounded-xl border-[1px] border-neutral-200 bg-white">
    <div class="flex flex-row items-center gap-1 p-4">
        <div class="text-2xl font-semibold">$ {{ $listing->price }}</div>
        <div class="font-light text-neutral-600">noche</div>
    </div>
    <hr />
    <x-calendar-input />
    <hr />
    <div class="p-4">
        <x-button>Reservar</x-button>
    </div>
    <hr />
    <div class="flex flex-row items-center justify-between p-4 text-lg font-semibold">
        <div>Total</div>
        <div>$ {{ $listing->price }}</div>
    </div>
</div>
