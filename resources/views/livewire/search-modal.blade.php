<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    public $location = '';

    public $currentStep = 'location';

    #[Validate(['date', 'after_or_equal:today'])]
    public $startDate;

    #[Validate(['date', 'after_or_equal:start_date'])]
    public $endDate;

    public $guests = 1;

    public $rooms = 1;

    public $bathrooms = 1;

    public function continueToDates()
    {
        $this->currentStep = 'dates';
    }

    public function continueToInfo()
    {
        $this->currentStep = 'info';
    }

    public function filter()
    {
        $this->redirect(route('home', [
            'location' => $this->location,
            'start_date' => $this->startDate,
            'endDate' => $this->endDate,
            'guests' => $this->guests,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
        ]), navigate: true);
    }
} ?>

<div x-data="{ showSearchModal: false }" x-on:show-search-modal.window="showSearchModal = true">
    <x-modal x-model="showSearchModal">
        <x-slot:title>
            <div class="text-lg font-semibold">Filtros</div>
        </x-slot>
        @if ($currentStep === 'location')
            <form id="locationFilterForm" wire:submit="continueToDates" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿A dónde quieres ir?</div>
                    <div class="mt-2 font-light text-neutral-500">Encuentra la ubicación perfecta.</div>
                </div>

                <div
                    wire:ignore
                    x-data="{
                        countries: [],
                        listingCountry: null,
                        initCountries() {
                            fetch(
                                'https://cdn.jsdelivr.net/gh/mledoze/countries@master/dist/countries.json',
                            )
                                .then((response) => response.json())
                                .then((data) => {
                                    this.countries = data
                                })
                        },
                    }"
                    x-init="initCountries()"
                    class="flex flex-col gap-8"
                >
                    <div class="relative">
                        <select
                            wire:model="location"
                            @change="listingCountry = countries.find((c) => c.cca2 === $wire.location)"
                            class="w-full appearance-none border-2 border-neutral-300 p-3 text-lg outline-none transition focus:border-black"
                        >
                            <option value="" disabled>Selecciona un país</option>
                            <template x-for="country in countries" :key="country.cca2">
                                <option
                                    :value="country.cca2"
                                    x-text="country.translations.spa?.common || country.name.common"
                                ></option>
                            </template>
                        </select>
                        <div class="absolute inset-y-0 right-0 mr-3 flex items-center">
                            <x-icon.chevron-up-down class="size-6" />
                        </div>
                    </div>

                    <x-map x-model="listingCountry" wire:ignore />
                </div>

                @error('location')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="submit" form="locationFilterForm">Siguiente</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'dates')
            <form id="dateFilterForm" wire:submit="continueToInfo" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Cuándo planeas ir?</div>
                    <div class="mt-2 font-light text-neutral-500">Asegúrate de que todos estén libres.</div>
                </div>
                <div>
                    <x-calendar-input wire:ignore x-model="reservationDateRange" />
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'location')" outline>Regresar</x-button>
                    <x-button type="submit" form="dateFilterForm">Siguiente</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'info')
            <form id="infoFilterForm" wire:submit="filter" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">Más información</div>
                    <div class="mt-2 font-light text-neutral-500">¡Encuentra tu lugar perfecto!</div>
                </div>

                <x-counter wire:model="guests">
                    <div>
                        <div class="font-medium">Huespedes</div>
                        <div class="font-light text-gray-600">¿Cuántos invitados van a venir?</div>
                    </div>
                </x-counter>
                <hr />
                <x-counter wire:model="rooms">
                    <div>
                        <div class="font-medium">Habitaciones</div>
                        <div class="font-light text-gray-600">¿Cuántas habitaciones necesitas?</div>
                    </div>
                </x-counter>
                <hr />
                <x-counter wire:model="bathrooms">
                    <div>
                        <div class="font-medium">Baños</div>
                        <div class="font-light text-gray-600">¿Cuántos baños necesitas?</div>
                    </div>
                </x-counter>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'dates')" outline>Regresar</x-button>
                    <x-button type="submit" form="infoFilterForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif
    </x-modal>
</div>
