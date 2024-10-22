<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public $listing;

    public $price;

    public $reservationDateRange = [];

    public function reserve() {
        [$startDate, $endDate] = $this->reservationDateRange;

        $diffInDays = Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate));
        $totalPrice = $diffInDays * $this->listing->price;

        $this->listing->reservations()->create([
            'user_id' => Auth::user()->id,
            'price' => $totalPrice,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
    }

    public function mount()
    {
        $this->price = $this->listing->price;
    }
}; ?>

<div
    x-data="{
        daysCount: 1,
        getTotalPrice() {
            let [start, end] = $wire.reservationDateRange;

            if (start && end) {
                let diffTime = Math.abs(new Date(end) - new Date(start))
                this.daysCount = Math.ceil(diffTime / (1000 * 60 * 60 * 24))
            }

            return this.daysCount * $wire.price
        },
    }"
    class="overflow-hidden rounded-xl border-[1px] border-neutral-200 bg-white"
>
    <div class="flex flex-row items-center gap-1 p-4">
        <div class="text-2xl font-semibold">$ {{ $listing->price }}</div>
        <div class="font-light text-neutral-600">noche</div>
    </div>
    <hr />
    <form wire:submit="reserve">
        <div class="p-4">
            <x-calendar-input wire:model="reservationDateRange" />
        </div>
        <hr />
        <div class="p-4">
            <x-button>Reservar</x-button>
        </div>
    </form>
    <hr />
    <div class="flex flex-row items-center justify-between p-4 text-lg font-semibold">
        <div>Total</div>
        <div>
            $
            <span x-text="getTotalPrice()"></span>
        </div>
    </div>
</div>
