<?php

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
