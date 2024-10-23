<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed()]
    public function reservations()
    {
        return Auth::user()->reservations;
    }
}; ?>

<div>
    @if (count($this->reservations) > 0)
        <div>
            <div class="text-2xl font-bold">Reservas</div>
            <div class="mt-2 font-light text-neutral-500">Reservas en tus propiedades</div>
        </div>
        <div
            class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6"
        >
            @foreach ($this->reservations as $reservation)
                <x-reservation-card :$reservation />
            @endforeach
        </div>
    @else
        <x-empty-state>
            <div class="text-center">
                <div class="text-2xl font-bold">No se encontraron reservas</div>
                <div class="mt-2 font-light text-neutral-500">Parece que no tienes reservas en tus propiedades.</div>
            </div>
        </x-empty-state>
    @endif
</div>
