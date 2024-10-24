<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component
{
    public Listing $listing;

    public function toggleFavorite(Listing $listing)
    {
        Auth::user()->favorites()->toggle($listing);
    }
} ?>

<div class="space-y-6">
    <div>
        <div class="text-2xl font-bold">
            {{ $listing->title }}
        </div>
        <div class="mt-2 font-light text-neutral-500">
            {{ $listing->country?->region.', '.$listing->country?->name }}
        </div>
    </div>

    <div class="relative h-[60vh] w-full overflow-hidden rounded-xl bg-neutral-200">
        @if ($listing->photo_url)
            <img src="{{ $listing->photo_url }}" fill class="w-full object-cover" alt="Image" />
        @endif

        <div class="absolute right-5 top-5">
            <button wire:click="toggleFavorite({{ $listing->id }})">
                <x-icon.heart
                    @class([
                        'size-6',
                        'fill-neutral-500/70' => ! auth()->user()->favorites->contains($listing),
                        'fill-rose-500' => auth()->user()->favorites->contains($listing),
                    ])
                />
            </button>
        </div>
    </div>
</div>
