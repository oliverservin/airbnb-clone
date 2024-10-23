<?php

use App\Models\Reservation;
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

    public function cancel(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);

        $reservation->delete();

        $this->dispatch('toast', message: 'Reserva cancelada');

        unset($this->trip);
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
                <div wire:key="{{ $trip->id }}" class="space-y-2">
                    <x-reservation-card :reservation="$trip" />

                    <x-button wire:click="cancel({{ $trip->id }})" wire:confirm="¿Estás seguro?" type="button" small>
                        Cancelar reserva
                    </x-button>
                </div>
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
