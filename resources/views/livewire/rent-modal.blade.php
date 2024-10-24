<?php

use App\Models\Category;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $title = '';

    public $description = '';

    public $category = '';

    public $country = '';

    public $countryCenter;

    public $guests = 1;

    public $rooms = 1;

    public $bathrooms = 1;

    public $price = '';

    public $photo;

    public $currentStep = 'category';

    public function continueToCountry()
    {
        $this->validate([
            'category' => ['required', 'exists:App\Models\Category,slug'],
        ]);

        $this->currentStep = 'country';
    }

    public function continueToInfo()
    {
        $this->validate([
            'country' => ['required', 'exists:App\Models\Country,code'],
        ]);

        $this->currentStep = 'info';
    }

    public function continueToImages()
    {
        $this->validate([
            'guests' => ['required', 'integer', 'min:1'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bathrooms' => ['required', 'integer', 'min:1'],
        ]);

        $this->currentStep = 'images';
    }

    public function continueToDescription()
    {
        $this->validate([
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        $this->currentStep = 'description';
    }

    public function continueToPrice()
    {
        $this->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $this->currentStep = 'price';
    }

    public function save()
    {
        $this->validate([
            'price' => ['required', 'integer', 'min:1'],
        ]);

        $listing = Auth::user()->listings()->create([
            'title' => $this->title,
            'description' => $this->description,
            'category_slug' => $this->category,
            'rooms' => $this->rooms,
            'bathrooms' => $this->bathrooms,
            'guests' => $this->guests,
            'country_code' => $this->country,
            'price' => $this->price,
        ]);

        if ($this->photo) {
            $listing->updatePhoto($this->photo);
        }

        $this->dispatch('toast', message: '¡Propiedad publicada!');

        $this->redirect(route('home'), navigate: true);
    }

    #[Computed]
    public function categories()
    {
        return Category::all();
    }

    #[Computed]
    public function countries()
    {
        return Country::all();
    }

    public function updatedCountry()
    {
        $this->countryCenter = Country::where('code', $this->country)->first()?->latlng;
    }
} ?>

<div x-data="{ showRentModal: false }" x-on:show-rent-modal.window="showRentModal = true">
    <x-modal x-model="showRentModal" @transitionend="$dispatch('rent-modal-transition-ended')">
        <x-slot:title>
            <div class="text-lg font-semibold">Pon tu casa en StayStop</div>
        </x-slot>

        @if ($currentStep === 'category')
            <form id="selectCategoryForm" wire:submit="continueToCountry" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Cuál de estas describe mejor tu lugar?</div>
                    <div class="mt-2 font-light text-neutral-500">Elige una categoría.</div>
                </div>

                <div class="grid max-h-[50vh] grid-cols-1 gap-3 overflow-y-auto md:grid-cols-2">
                    @foreach ($this->categories as $category)
                        <div class="col-span-1">
                            <x-category-input
                                wire:model="category"
                                name="category"
                                :icon="$category->icon"
                                :value="$category->slug"
                            >
                                {{ $category->name }}
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

        @if ($currentStep === 'country')
            <form id="selectCountryForm" wire:submit="continueToInfo" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Dónde se encuentra su casa?</div>
                    <div class="mt-2 font-light text-neutral-500">Ayuda a tus invitados a encontrarte.</div>
                </div>

                <div class="flex flex-col gap-8">
                    <div class="relative">
                        <select
                            wire:model.live="country"
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
                        wire:model="countryCenter"
                        @rent-modal-transition-ended.window="map.invalidateSize()"
                        wire:ignore
                    />
                </div>

                @error('country')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'category')" outline>Regresar</x-button>
                    <x-button type="submit" form="selectCountryForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'info')
            <form id="infoForm" wire:submit="continueToImages" class="flex flex-col gap-8">
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

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'country')" outline>Regresar</x-button>
                    <x-button type="submit" form="infoForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'images')
            <form id="imagesForm" wire:submit="continueToDescription" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">Añade una foto de tu casa</div>
                    <div class="mt-2 font-light text-neutral-500">Muestra a tus invitados cómo es tu casa.</div>
                </div>

                <div x-data="{ photoPreview: null }">
                    <input
                        wire:model="photo"
                        type="file"
                        id="photo"
                        class="hidden"
                        x-ref="photo"
                        x-on:change="
                            const reader = new FileReader()
                            reader.onload = (e) => {
                                photoPreview = e.target.result
                            }
                            reader.readAsDataURL($refs.photo.files[0])
                        "
                    />

                    <button
                        type="button"
                        @click="$refs.photo.click()"
                        class="relative flex w-full cursor-pointer flex-col items-center justify-center gap-4 border-2 border-dashed border-neutral-300 p-20 text-neutral-600 transition hover:opacity-70"
                    >
                        <x-icon.photo class="size-[50px]" />
                        <div class="text-lg font-semibold">Click to upload</div>
                        <div x-show="photoPreview" class="absolute inset-0 h-full w-full overflow-hidden">
                            <img fill class="object-cover" :src="photoPreview" alt="House" />
                        </div>
                    </button>
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'info')" outline>Regresar</x-button>
                    <x-button type="submit" form="imagesForm">Continuar</x-button>
                </div>
            </x-slot>
        @endif

        @if ($currentStep === 'description')
            <form id="descriptionForm" wire:submit="continueToPrice" class="flex flex-col gap-8">
                <div>
                    <div class="text-2xl font-bold">¿Cómo describirías tu lugar?</div>
                    <div class="mt-2 font-light text-neutral-500">Lo mejor es que sea breve y concisa.</div>
                </div>

                <div>
                    <x-input wire:model="title" label="Título" :has-error="$errors->has('title')" />

                    @error('title')
                        <p class="mt-2 text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <hr />

                <div>
                    <x-input wire:model="description" label="Descripción" :has-error="$errors->has('description')" />

                    @error('description')
                        <p class="mt-2 text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'images')" outline>Regresar</x-button>
                    <x-button type="submit" form="descriptionForm">Continuar</x-button>
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
                    <x-price-input wire:model="price" label="Precio" :has-error="$errors->has('price')" />

                    @error('price')
                        <p class="mt-2 text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
            </form>

            <x-slot:footer>
                <div class="flex w-full flex-row items-center gap-4">
                    <x-button type="button" @click="$wire.set('currentStep', 'description')" outline>Regresar</x-button>
                    <x-button type="submit" form="priceForm">Publicar</x-button>
                </div>
            </x-slot>
        @endif
    </x-modal>
</div>
