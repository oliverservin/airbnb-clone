<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware('auth');

name('favorites'); ?>

<x-layouts.app>
    <x-container>
        <livewire:favorites-list />
    </x-container>
</x-layouts.app>
