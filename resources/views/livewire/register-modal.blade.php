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

        Auth::login($user, true);

        $this->redirect(route('home'), navigate: true);
    }
} ?>

<!-- TODO: Create alpine component with `showRegisterModal` -->
<!-- TODO: Listen to `show-register-modal` to show register modal -->
<div x-data="{ showRegisterModal: false }" x-on:show-register-modal.window="showRegisterModal = true">
    <x-modal x-model="showRegisterModal">
        <!-- TODO: Add to title slot -->
        <x-slot name="title">
            <div class="text-lg font-semibold">Registrarse</div>
        </x-slot>

        <!-- TODO: Main slot -->
        <form id="registerForm" wire:submit="register" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido a StaySpot</div>
                <div class="mt-2 font-light text-neutral-500">Crear una cuenta</div>
            </div>

            <div>
                <!-- TODO: add input component -->
                <x-input wire:model="email" type="email" label="Email" :has-error="$errors->has('email')" />
                <!-- TODO: add email input field -->
                <!-- TODO: add `has-error` attribute on field error -->

                <!-- TODO: show on field error -->
                @error('email')
                    <p class="mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <!-- TODO: add name field -->
                <x-input wire:model="name" type="text" label="Nombre" :has-error="$errors->has('name')" />

                @error('name')
                    <p class="mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <!-- TODO: add password field -->
                <x-input wire:model="password" type="password" label="Contraseña" :has-error="$errors->has('password')" />

                @error('password')
                    <p class="mt-2 text-rose-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </form>

        <!-- TODO: add to footer slot -->
        <x-slot name="footer">
            <div class="flex w-full flex-row items-center gap-4">
                <x-button form="registerForm">Continuar</x-button>
                <!-- TODO: add continue button to submit form -->
            </div>
            <div class="mt-3 flex flex-col gap-4">
                <hr />
                <div class="mt-4 text-center font-light text-neutral-500">
                    <div>
                        ¿Ya tienes una cuenta?
                        <!-- TODO: dispatch evento to show login modal -->
                        <button @click="showRegisterModal = false; $dispatch('show-login-modal')" class="cursor-pointer text-neutral-800 hover:underline">Iniciar sesión</button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
