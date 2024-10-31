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
                </div>
            </div>
        </div>
    </x-container>
</x-layouts.app>
