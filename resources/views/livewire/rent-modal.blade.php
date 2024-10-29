<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    #[Validate(['required', 'integer', 'min:1'])]
    public $guests = 1;

    #[Validate(['required', 'integer', 'min:1'])]
    public $rooms = 1;

    #[Validate(['required', 'integer', 'min:1'])]
    public $bathrooms = 1;

    #[Validate(['required'])]
    public $title;

    #[Validate(['required'])]
    public $description;

    #[Validate(['required', 'integer', 'min:1'])]
    public $price;

    public function save()
    {
        $this->validate();

        $listing = Auth::user()->listings()->create([
            'guests' => $this->guests,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);
    }
} ?>

<div x-data="{ showRentModal: true }" x-on:show-rent-modal.window="showRentModal = true">
    <x-modal x-model="showRentModal">
        <x-slot name="title">
            <div class="text-lg font-semibold">Pon tu casa en StayStop</div>
        </x-slot>

        <form id="saveProperty" wire:submit="save" class="flex flex-col gap-8">
            <div>
                <div class="text-2xl font-bold">Comparte algunos datos básicos sobre tu casa</div>
                <div class="mt-2 font-light text-neutral-500">¿Qué comodidades tienes?</div>
            </div>

            <x-counter wire:model="guest">
                <div>
                    <div class="font-medium">Huespedes</div>
                    <div class="font-light text-gray-600">¿Cuántos invitados se permiten?</div>
                </div>

                @error('guests')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </x-counter>

            <x-counter wire:model="rooms">
                <div>
                    <div class="font-medium">Habitaciones</div>
                    <div class="font-light text-gray-600">¿Cuántas habitaciones tienes?</div>
                </div>

                @error('rooms')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </x-counter>

            <x-counter wire:model="bathrooms">
                <div>
                    <div class="font-medium">Baños</div>
                    <div class="font-light text-gray-600">¿Cuántos baños tienes?</div>
                </div>

                @error('bathrooms')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </x-counter>

            <div>
                <div class="text-2xl font-bold">¿Cómo describirías tu lugar?</div>
                <div class="mt-2 font-light text-neutral-500">Lo mejor es que sea breve y concisa.</div>
            </div>

            <div>
                <x-input wire:model="title" label="Título" />

                @error('title')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <hr />

            <div>
                <x-input wire:model="description" label="Descripción" />

                @error('description')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="text-2xl font-bold">Ahora, establece tu precio</div>
                <div class="mt-2 font-light text-neutral-500">¿Cuánto se cobra por noche?</div>
            </div>

            <div>
                <x-price-input wire:model="price" label="Precio" />

                @error('price')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </div>
        </form>

        <x-slot name="footer">
            <x-button form="saveProperty" type="submit">Publicar</x-button>
        </x-slot>
    </x-modal>
</div>
