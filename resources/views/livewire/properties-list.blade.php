<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed()]
    public function properties()
    {
        return Auth::user()->listings;
    }

    public function delete(Listing $listing)
    {
        $this->authorize('delete', $listing);

        $listing->delete();

        $this->dispatch('toast', message: 'Propiedad eliminada');

        unset($this->properties);
    }
}; ?>

<div>
    @if (count($this->properties) > 0)
        <div>
            <div class="text-2xl font-bold">Propiedades</div>
            <div class="mt-2 font-light text-neutral-500">Lista de tus propiedades</div>
        </div>
        <div
            class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6"
        >
            @foreach ($this->properties as $listing)
                <div wire:key="{{ $listing->id }}" class="space-y-2">
                    <x-listing-card :$listing />
                    <x-button wire:click="delete({{ $listing->id }})" wire:confirm="¿Estás seguro?" type="button" small>
                        Eliminar propiedad
                    </x-button>
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state>
            <div class="text-center">
                <div class="text-2xl font-bold">No se encontraron propiedades</div>
                <div class="mt-2 font-light text-neutral-500">Parece que no tienes propiedades.</div>
            </div>
        </x-empty-state>
    @endif
</div>
