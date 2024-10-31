<?php

use Illuminate\Support\Facades\Auth;
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

    public $currentStep = 'photo';

    public function validateInfo()
    {
        $this->validate([
            'guests' => ['required', 'integer', 'min:1'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bathrooms' => ['required', 'integer', 'min:1'],
        ]);

        $this->currentStep = 'photo';
    }

    public function validatePhoto()
    {
        // TODO: add validation

        $this->currentStep = 'description';
    }

    public function validateDescription()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $this->currentStep = 'price';
    }

    public function save()
    {
        $this->validate();

        Auth::user()->listings()->create([
            'guests' => $this->guests,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->redirect(route('home'), navigate: true);
    }

    public function validationAttributes()
    {
        return [
            'guests' => 'huéspedes',
            'rooms' => 'habitaciones',
            'bathrooms' => 'baños',
            'title' => 'título',
            'description' => 'descripción',
            'price' => 'precio',
        ];
    }
} ?>

<div x-data="{ showRentModal: true }" x-on:show-rent-modal.window="showRentModal = true">
    <x-modal x-model="showRentModal">
        <x-slot name="title">
            <div class="text-lg font-semibold">Pon tu casa en StayStop</div>
        </x-slot>

        @if ($currentStep === 'info')
            <form id="infoForm" wire:submit="validateInfo" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">Comparte algunos datos básicos sobre tu casa</div>
                    <div class="mt-2 font-light text-neutral-500">¿Qué comodidades tienes?</div>
                </div>

                <x-counter wire:model="guests">
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
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="submit" form="infoForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'photo')
            <form id="photoForm" wire:submit="validatePhoto" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">Añade una foto de tu casa</div>
                    <div class="mt-2 font-light text-neutral-500">Muestra a tus invitados cómo es tu casa.</div>
                </div>

                <div x-data="{ photoPreview: null }">
                    <input @change="" class="hidden" x-ref="photo" type="file" />
                    <button
                        @click="$refs.photo.click()"
                        type="button"
                        class="relative flex w-full flex-col items-center justify-center gap-4 border-2 border-dashed border-neutral-300 p-20 text-neutral-600 transition hover:opacity-70"
                    >
                        <x-icon.photo class="size-[50px]" />
                        <div class="text-lg font-semibold">Haz clic para subir foto</div>
                        <!-- Photo preview -->
                        <div class="absolute inset-0 h-full w-full overflow-hidden">
                            <img :src="photoPreview" class="object-cover" alt="House" />
                        </div>
                    </button>
                </div>
            </form>

            <x-slot name="footer">
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'info')" outline>Regresar</x-button>
                    <x-button type="submit" form="photoForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'description')
            <form id="descriptionForm" wire:submit="validateDescription" class="flex flex-col gap-8">
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
            </form>

            <x-slot name="footer">
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button outline @click="$wire.set('currentStep', 'photo')">Regresar</x-button>
                    <x-button type="submit" form="descriptionForm">Publicar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'price')
            <form id="priceForm" wire:submit="save" class="flex flex-col gap-8">
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
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button outline @click="$wire.set('currentStep', 'description')">Regresar</x-button>
                    <x-button type="submit" form="priceForm">Publicar</x-button>
                </div>
            </x-slot>
        @endif
    </x-modal>
</div>
