<?php

use Livewire\Volt\Component;

new class extends Component
{
    //
}; ?>

<div x-data="{ showRegisterModal: true }">
    <x-modal x-model="showRegisterModal">
        <x-slot name="title">
            <div class="text-lg font-semibold">Registrarse</div>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-modal>
</div>
