<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware('auth');

name('properties');

?>

<x-layouts.app>
    <x-container>
        <livewire:properties-list />
    </x-container>
</x-layouts.app>
