<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Component;

new class extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'lowercase', 'email', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        $this->redirect(route('home'), navigate: true);
    }
}; ?>

<div x-data="{ showRegisterModal: false }" x-on:show-register-modal.window="showRegisterModal = true">
    <x-modal x-model="showRegisterModal">
        <x-slot:title>
            <div class="text-lg font-semibold">Registrarse</div>
        </x-slot>
        <form id="registerForm" wire:submit="register" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido a StaySpot</div>
                <div class="mt-2 font-light text-neutral-500">Crear una cuenta</div>
            </div>

            <x-input wire:model="email" label="Email" required />
            <x-input wire:model="name" label="Nombre" required />
            <x-input wire:model="password" type="password" label="Contraseña" required />
        </form>
        <x-slot:footer>
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
                            class="cursor-pointer text-neutral-800 hover:underline"
                        >
                            Iniciar sesión
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
