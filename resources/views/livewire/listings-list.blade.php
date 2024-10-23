<?php

use App\Models\Listing;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;

new class extends Component
{
    #[Url]
    public $category = '';

    #[Url]
    public $location = '';

    #[Url]
    public ?int $guests = null;

    #[Url]
    public ?int $rooms = null;

    #[Url]
    public ?int $bathrooms = null;

    #[Computed]
    public function listings()
    {
        $listing = Listing::query();

        if ($this->category) {
            $listing->where('category_label', '=', $this->category);
        }

        if ($this->location) {
            $listing->where('location', '=', $this->location);
        }

        if ($this->guests) {
            $listing->where('guests', '>=', $this->guests);
        }

        if ($this->rooms) {
            $listing->where('rooms', '>=', $this->rooms);
        }

        if ($this->bathrooms) {
            $listing->where('bathrooms', '>=', $this->bathrooms);
        }

        return $listing->get();
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
                <div class="text-2xl font-bold">No hay coincidencias exactas</div>
                <div class="mt-2 font-light text-neutral-500">Intenta cambiar o eliminar algunos de tus filtros.</div>
                <div class="w-48 mt-4 mx-auto">
                    <x-button href="{{ route('home') }}" wire:navigate outline>Eliminar filtros</x-button>
                </div>
            </div>
        </x-empty-state>
    @endif
</div>
