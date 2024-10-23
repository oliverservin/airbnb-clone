<?php

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component
{
    public Listing $listing;

    public $price;

    public $disabledDates;

    #[Validate(['required', 'date', 'after_or_equal:today'])]
    public $startDate;

    #[Validate(['required', 'date', 'after_or_equal:start_date'])]
    public $endDate;

    public function reserve()
    {
        $this->validate();

        if ($this->findReservation()) {
            throw ValidationException::withMessages([
                'startDate' => 'Ya existe una reserva para la fecha elegida.',
            ]);
        }

        $diffInDays = Carbon::parse($this->startDate)->diffInDays(Carbon::parse($this->endDate));

        $totalPrice = $diffInDays * $this->listing->price;

        $this->listing->reservations()->create([
            'user_id' => Auth::user()->id,
            'price' => $totalPrice,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ]);

        $this->dispatch('toast', message: 'Reserva completada');

        $this->redirect(route('trips'), navigate: true);
    }

    protected function findReservation()
    {

        return $this->listing->reservations()
            ->where('start_date', '<=', $this->endDate)
            ->where('end_date', '>=', $this->startDate)
            ->first();
    }

    public function mount()
    {
        $this->price = $this->listing->price;

        $this->disabledDates = $this->listing->reservations->map(function ($reservation) {
            return [
                'from' => $reservation->start_date,
                'to' => $reservation->end_date,
            ];
        });
    }
}; ?>

<div
    x-data="{
        reservationDateRange: [],
        disabledDates: [],
        daysCount: 1,
        getTotalPrice() {
            let [start, end] = this.reservationDateRange

            if (start && end) {
                let diffTime = Math.abs(new Date(end) - new Date(start))
                this.daysCount = Math.ceil(diffTime / (1000 * 60 * 60 * 24))
            }

            return this.daysCount * $wire.price
        },
        init() {
            this.disabledDates = $wire.disabledDates

            this.$watch('reservationDateRange', () => {
                let [start, end] = this.reservationDateRange

                $wire.startDate = start
                $wire.endDate = end
            })
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
            <x-calendar-input wire:ignore x-model="reservationDateRange" />

            @error('startDate')
                <p class="mt-2 text-rose-500">{{ $message }}</p>
            @enderror

            @error('endDate')
                <p class="mt-2 text-rose-500">{{ $message }}</p>
            @enderror
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
