<?php

use function Laravel\Folio\name;

name('home');

?>

<x-layouts.app>
    @volt('pages.index')
        <div>
            <!-- // -->
        </div>
    @endvolt
</x-layouts.app>
