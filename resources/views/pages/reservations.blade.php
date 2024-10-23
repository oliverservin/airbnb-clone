<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware('auth');

name('reservations'); ?>

<x-layouts.app>
    <x-container>
        <livewire:reservations-list />
    </x-container>
</x-layouts.app>
