<?php

use App\Models\Listing;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed()]
    public function listings()
    {
        return Listing::all();
    }
}; ?>

<div>
    @if (count($this->listings) > 0)
        <div
            class="grid grid-cols-1 gap-8 pt-24 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6"
        >
            @foreach ($this->listings as $listing)
                <x-listing-card :$listing />
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
