<?php

use function Laravel\Folio\name;

name('listings.show'); ?>

<x-layouts.app>
    <x-container>
        <div class="mx-auto max-w-screen-lg">
            <div class="flex flex-col gap-6">
                <livewire:listing-head :$listing />
                <div class="mt-6 grid grid-cols-1 md:grid-cols-7 md:gap-10">
                    <x-listing-info :listing="$listing" />
                    <div class="order-first mb-10 md:order-last md:col-span-3">
                        <livewire:listing-reservation :$listing />
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-layouts.app>
