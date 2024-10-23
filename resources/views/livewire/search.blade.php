<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Computed;
use Livewire\Volt\Component;

new class extends Component
{
    public ?string $location = null;

    public ?string $startDate = null;

    public ?string $endDate = null;

    public ?int $guests = null;

    #[Computed]
    public function duration()
    {
        return $this->startDate && $this->endDate
            ? Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate))
            : null;
    }

    public function mount()
    {
        $this->location = Request::get('location');
        $this->guests = Request::get('guests');
        $this->startDate = Request::get('startDate');
        $this->endDate = Request::get('endDate');
    }
} ?>

<div>
    <button
        @click="$dispatch('show-search-modal')"
        class="w-full cursor-pointer rounded-full border-[1px] py-2 shadow-sm transition hover:shadow-md md:w-auto"
    >
        <div class="flex flex-row items-center justify-between">
            <div class="px-6 text-sm font-semibold">
                {{ $location ?? 'Cualquier lugar' }}
            </div>
            <div class="hidden flex-1 border-x-[1px] px-6 text-center text-sm font-semibold sm:block">
                @if ($this->duration)
                    {{ $this->duration }} {{ $this->duration > 1 ? 'días' : 'día' }}
                @else
                    Cualquier semana
                @endif
            </div>
            <div class="flex flex-row items-center gap-3 pl-6 pr-2 text-sm text-gray-600">
                <div class="hidden sm:block">
                    @if ($guests > 0)
                        {{ $guests }} {{ $guests > 1 ? 'huéspedes' : 'huésped' }}
                    @else
                        ¿Cuántos huéspedes?
                    @endif
                </div>
                <div class="rounded-full bg-rose-500 p-2 text-white">
                    <x-icon.search class="size-[18px]" />
                </div>
            </div>
        </div>
    </button>
</div>
