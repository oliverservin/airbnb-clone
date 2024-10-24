<?php

use App\Models\Country;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    public $country = '';

    public $countryCenter;

    #[Validate(['date', 'after_or_equal:today'])]
    public $startDate;

    #[Validate(['date', 'after_or_equal:startDate'])]
    public $endDate;

    public $guests;

    public $rooms;

    public $bathrooms;

    public $currentStep = 'country';

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
            'country' => $this->country,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'guests' => $this->guests,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
        ]), navigate: true);
    }

    public function mount()
    {
        $this->country = Request::get('country', '');
        $this->guests = Request::get('guests', 1);
        $this->rooms = Request::get('rooms', 1);
        $this->bathrooms = Request::get('bathrooms', 1);
        $this->startDate = Request::get('startDate');
        $this->endDate = Request::get('endDate');

        $this->countryCenter = Country::where('code', $this->country)->first()?->latlng;
    }

    #[Computed]
    public function countries()
    {
        return Country::all();
    }

    public function getSelectedCenter()
    {
        $country = Country::where('code', $this->country)->first();

        return $country?->latlng;
    }
} ?>

<div x-data="{ showSearchModal: false }" x-on:show-search-modal.window="showSearchModal = true">
    <x-modal x-model="showSearchModal" @transitionend="$dispatch('search-modal-transition-ended')">
        <x-slot:title>
            <div class="text-lg font-semibold">Filtros</div>
        </x-slot>
        @if ($currentStep === 'country')
            <form id="countryFilterForm" wire:submit="continueToDates" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿A dónde quieres ir?</div>
                    <div class="mt-2 font-light text-neutral-500">Encuentra la ubicación perfecta.</div>
                </div>

                <div
                    x-data="{
                        selectedCenter: null,
                        init() {
                            this.selectedCenter  = $wire.countryCenter
                        }
                    }"
                    class="flex flex-col gap-8"
                >
                    <div class="relative">
                        <select
                            wire:model="country"
                            @change="selectedCenter = await $wire.getSelectedCenter()"
                            class="w-full appearance-none border-2 border-neutral-300 p-3 text-lg outline-none transition focus:border-black"
                        >
                            <option value="" disabled>Selecciona un país</option>
                            @foreach ($this->countries as $country)
                                <option value="{{ $country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 mr-3 flex items-center">
                            <x-icon.chevron-up-down class="size-6" />
                        </div>
                    </div>

                    <x-map
                        x-model="selectedCenter"
                        wire:ignore
                        @search-modal-transition-ended.window="map.invalidateSize()"
                    />
                </div>

                @error('country')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="submit" form="countryFilterForm">Siguiente</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'dates')
            <form id="dateFilterForm" wire:submit="continueToInfo" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Cuándo planeas ir?</div>
                    <div class="mt-2 font-light text-neutral-500">Asegúrate de que todos estén libres.</div>
                </div>
                <div
                    x-data="{
                        reservationDateRange: [],
                        init() {
                            if ($wire.startDate && $wire.endDate) {
                                this.reservationDateRange = [$wire.startDate, $wire.endDate]
                            }

                            this.$watch('reservationDateRange', () => {
                                let [start, end] = this.reservationDateRange

                                $wire.startDate = start
                                $wire.endDate = end
                            })
                        },
                    }"
                >
                    <x-calendar-input wire:ignore x-model="reservationDateRange" />
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'country')" outline>Regresar</x-button>
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
