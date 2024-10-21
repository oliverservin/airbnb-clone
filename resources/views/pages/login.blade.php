<?php

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;

middleware('guest');

name('login'); ?>

<x-layouts.app>
    <x-container>
        <div x-init="$dispatch('show-login-modal')"></div>
    </x-container>
</x-layouts.app>
