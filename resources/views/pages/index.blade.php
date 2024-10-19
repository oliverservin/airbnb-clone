<?php

use function Laravel\Folio\name;

name('home');

?>

<x-layouts.app>
    @volt('pages.index')
        <div>
            <!-- // -->
            &nbsp;
        </div>
    @endvolt
</x-layouts.app>
