<?php

use function Laravel\Folio\name;

name('listings.show'); ?>

<x-layouts.app>
    <x-container>
        <div class="mx-auto max-w-screen-lg">
            <div class="flex flex-col gap-6">
                <x-listing-head :$listing />
                <div class="mt-6 grid grid-cols-1 md:grid-cols-7 md:gap-10">
                    <x-listing-info :listing="$listing" />
                    <div class="order-first mb-10 md:order-last md:col-span-3">
                        <div
                            class="overflow-hidden rounded-xl border-[1px] border-neutral-200 bg-white"
                        >
                            <div class="flex flex-row items-center gap-1 p-4">
                                <div class="text-2xl font-semibold">$ {{ $listing->price }}</div>
                                <div class="font-light text-neutral-600">noche</div>
                            </div>
                            <hr />
                            <form>
                                <div x-data="{ reservationDateRange: ['2024-11-07', '2024-11-10'] }" class="p-4">
                                    <x-calendar-input wire:ignore x-model="reservationDateRange" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-layouts.app>
