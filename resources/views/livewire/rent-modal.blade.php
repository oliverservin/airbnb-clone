<?php

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    public $category = '';

    public $currentStep = 'category';

    public function continueToLocation()
    {
        $this->validate([
            'category' => ['required', 'exists:App\Models\Category,label'],
        ]);

        $this->currentStep = 'location';
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
            <form id="rentForm" wire:submit="continueToLocation" class="flex flex-col gap-8">
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
        @endif

        <x-slot:footer>
            <div class="flex w-full flex-row items-center gap-4">
                <x-button type="submit" form="rentForm">Continuar</x-button>
            </div>
        </x-slot>
    </x-modal>
</div>
