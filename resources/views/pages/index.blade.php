<?php

use function Laravel\Folio\name;

name('home');

?>

<x-layouts.app>
    <x-container>
        <livewire:listings-list />
    </x-container>
</x-layouts.app>
