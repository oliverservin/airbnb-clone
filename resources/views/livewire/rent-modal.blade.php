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
        </form>

        <x-slot name="footer">
            <x-button form="saveProperty" type="submit">Publicar</x-button>
        </x-slot>
    </x-modal>
</div>
