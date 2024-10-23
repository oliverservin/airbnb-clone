<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed()]
    public function trips()
    {
        return Auth::user()->trips;
    }
}; ?>

<div>
    @if (count($this->trips) > 0)
        <div>
            <div class="text-2xl font-bold">Viajes</div>
            <div class="mt-2 font-light text-neutral-500">Dónde has estado y adónde vas</div>
        </div>
        <div
            class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6"
        >
            @foreach ($this->trips as $trip)
                <x-reservation-card :reservation="$trip" />
            @endforeach
        </div>
    @else
        <x-empty-state>
            <div class="text-center">
                <div class="text-2xl font-bold">No se encontraron viajes</div>
                <div class="mt-2 font-light text-neutral-500">Parece que no has reservado ningún viaje.</div>
            </div>
        </x-empty-state>
    @endif
</div>
