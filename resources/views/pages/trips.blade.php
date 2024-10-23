<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware('auth');

name('trips'); ?>

<x-layouts.app>
    <x-container>
        <livewire:trips-list />
    </x-container>
</x-layouts.app>
