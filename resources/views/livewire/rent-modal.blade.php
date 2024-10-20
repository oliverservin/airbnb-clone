<?php

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    public $category = '';

    public $country = '';

    public $currentStep = 'category';

    public function continueToLocation()
    {
        $this->validate([
            'category' => ['required', 'exists:App\Models\Category,label'],
        ]);

        $this->currentStep = 'location';
    }

    public function continueToInfo()
    {
        $this->validate([
            'country' => ['required'],
        ]);

        $this->currentStep = 'info';
    }

    #[Computed]
    public function categories()
    {
        return Category::all();
    }
}; ?>

<div x-data="{ showRentModal: true }" x-on:show-rent-modal.window="showRentModal = true">
    <x-modal x-model="showRentModal">
        <x-slot:title>
            <div class="text-lg font-semibold">Pon tu casa en StayStop</div>
        </x-slot>

        @if ($currentStep === 'category')
            <form id="selectCategoryForm" wire:submit="continueToLocation" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Cuál de estas describe mejor tu lugar?</div>
                    <div class="mt-2 font-light text-neutral-500">Elige una categoría</div>
                </div>

                <div class="grid max-h-[50vh] grid-cols-1 gap-3 overflow-y-auto md:grid-cols-2">
                    @foreach ($this->categories as $category)
                        <div class="col-span-1">
                            <x-category-input
                                wire:model="category"
                                name="category"
                                :icon="$category->icon"
                                :value="$category->label"
                            >
                                {{ $category->label }}
                            </x-category-input>
                        </div>
                    @endforeach
                </div>

                @error('category')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="submit" form="selectCategoryForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'location')
            <form id="selectLocationForm" wire:submit="continueToInfo" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Dónde está ubicado tu lugar?</div>
                    <div class="mt-2 font-light text-neutral-500">¡Ayuda a los huéspedes a encontrarte!</div>
                </div>

                @error('country')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror

                <div
                    wire:ignore
                    x-data="{
                        countries: [],
                        map: null,
                        marker: null,
                        initCountries() {
                            fetch('https://raw.githubusercontent.com/mledoze/countries/master/dist/countries.json')
                                .then(response => response.json())
                                .then(data => {
                                    this.countries = data;
                                })
                                .catch(error => {
                                    console.error('Error fetching countries:', error);
                                });
                        },
                        initMap() {
                            this.map = L.map('map').setView([0, 0], 2);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href=\'https://www.openstreetmap.org/copyright\'>OpenStreetMap</a> contributors'
                            }).addTo(this.map);
                        },
                        updateMap() {
                            if (!$wire.country) return;
                            const country = this.countries.find(c => c.cca2 === $wire.country);
                            if (country && country.latlng) {
                                this.map.setView(country.latlng, 4);

                                // Remove existing marker if any
                                if (this.marker) {
                                    this.map.removeLayer(this.marker);
                                }

                                // Add new marker
                                this.marker = L.marker(country.latlng).addTo(this.map);
                            }
                        },
                        getCountryNameInSpanish(country) {
                            return country.translations.spa?.common || country.name.common;
                        }
                    }"
                    x-init="initCountries(); $nextTick(() => initMap())"
                    class="flex flex-col gap-8"
                >
                    <select wire:model="country" @change="updateMap" class="w-full appearance-none border-2 border-neutral-300 p-3 text-lg outline-none transition focus:border-black">
                        <option value="" disabled>Selecciona un país</option>
                        <template x-for="country in countries" :key="country.cca2">
                            <option :value="country.cca2" x-text="getCountryNameInSpanish(country)"></option>
                        </template>
                    </select>

                    <div id="map" class="h-[35vh] rounded-lg"></div>
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'category')" outline>Regresar</x-button>
                    <x-button type="submit" form="selectLocationForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif
    </x-modal>
</div>
