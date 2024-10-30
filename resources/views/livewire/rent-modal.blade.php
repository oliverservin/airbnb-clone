<?php

use Livewire\Volt\Component;

new class extends Component {} ?>

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

            <x-counter wire:model="guests">
                <div>
                    <div class="font-medium">Huespedes</div>
                    <div class="font-light text-gray-600">¿Cuántos invitados se permiten?</div>
                </div>
            </x-counter>

            <x-counter wire:model="rooms">
                <div>
                    <div class="font-medium">Habitaciones</div>
                    <div class="font-light text-gray-600">¿Cuántas habitaciones tienes?</div>
                </div>
            </x-counter>

            <x-counter wire:model="bathrooms">
                <div>
                    <div class="font-medium">Baños</div>
                    <div class="font-light text-gray-600">¿Cuántos baños tienes?</div>
                </div>
            </x-counter>
        </form>

        <x-slot name="footer">
            <x-button form="saveProperty" type="submit">Publicar</x-button>
        </x-slot>
    </x-modal>
</div>
