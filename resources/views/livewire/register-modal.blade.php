<?php

use Livewire\Volt\Component;

new class extends Component {
    public $name;
    public $email;
    public $password;

    public function register()
    {

    }

}

?>

<div x-data="{ showRegisterModal: false }" x-on:show-register-modal.window="showRegisterModal = true">
    <x-modal x-model="showRegisterModal">
        <x-slot name="title">
            <div class="text-lg font-semibold">Registrarse</div>
        </x-slot>
        <form wire:submit="register" id="registerForm" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido a StaySpot</div>
                <div class="mt-2 font-light text-neutral-500">Crear una cuenta</div>
            </div>

            <div>
                <x-input wire:model="email" label="Email" type="email" />

                <!-- <p class="mt-2 text-rose-500">Mensaje de error</p> -->
            </div>

            <div>
                <x-input wire:model="name" label="Nombre" type="text" />
            </div>

            <div>
                <x-input wire:model="password" label="Contraseña" type="password" />
            </div>
        </form>
        <x-slot name="footer">
            <div class="flex w-full flex-row items-center gap-4">
                <x-button type="submit" form="registerForm">Continuar</x-button>
            </div>
            <div class="mt-3 flex flex-col gap-4">
                <hr />
                <div class="mt-4 text-center font-light text-neutral-500">
                    <div>
                        ¿Ya tienes una cuenta?
                        <button
                            @click="$dispatch('show-login-modal'); showRegisterModal = false;"
                            class="text-neutral-800 hover:underline"
                        >
                            Iniciar sesión
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
