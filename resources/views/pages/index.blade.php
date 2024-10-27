<?php

use function Laravel\Folio\name;

name('home') ?>

<x-layouts.app>
    @volt
        <x-container>
            @auth
                Hola {{ auth()->user()->name }}
            @else
                Bienvenido
            @endauth
        </x-container>
    @endvolt
</x-layouts.app>
