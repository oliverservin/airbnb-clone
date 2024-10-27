<?php

use function Laravel\Folio\name;

name('home') ?>

<x-layouts.app>
    <x-container>
        @auth
            Hola {{ auth()->user()->name }}
        @else
            Bienvenido
        @endauth
    </x-container>
</x-layouts.app>
