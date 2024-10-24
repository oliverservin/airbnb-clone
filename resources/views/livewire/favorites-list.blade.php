<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    #[Computed()]
    public function favorites()
    {
        return Auth::user()->favorites;
    }

    public function toggleFavorite(Listing $listing)
    {
        Auth::user()->favorites()->toggle($listing);

        unset($this->favorites);
    }
}; ?>

<div>
    @if (count($this->favorites) > 0)
        <div>
            <div class="text-2xl font-bold">Favoritos</div>
            <div class="mt-2 font-light text-neutral-500">Lista de lugares que has marcado como favoritos.</div>
        </div>
        <div
            class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6"
        >
            @foreach ($this->favorites as $listing)
                <div wire:key="{{ $listing->id }}" class="space-y-2">
                    <x-listing-card :$listing />
                </div>
            @endforeach
        </div>
    @else
        <x-empty-state>
            <div class="text-center">
                <div class="text-2xl font-bold">No se encontraron favoritos</div>
                <div class="mt-2 font-light text-neutral-500">Parece que no tienes listados favoritos.</div>
            </div>
        </x-empty-state>
    @endif
</div>
