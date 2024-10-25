<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public $email = '';

    public $password = '';

    public function login ()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $this->authenticate();

        Session::regenerate();

        $this->dispatch('toast', message: 'Sesión iniciada.');

        $this->redirectIntended(default: route('home'), navigate: true);
    }

    protected function authenticate()
    {
        if (! Auth::attempt($this->only(['email', 'password']), true)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
}; ?>

<div x-data="{ showLoginModal: false }" x-on:show-login-modal.window="showLoginModal = true">
    <x-modal x-model="showLoginModal">
        <!-- TODO: Add to title slot -->
        <x-slot name="title">
            <div class="text-lg font-semibold">Iniciar sesión</div>
        </x-slot>

        <!-- TODO: Main slot -->
        <form id="loginForm" wire:submit="login" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido</div>
                <div class="mt-2 font-light text-neutral-500">Accede a tu cuenta</div>
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
                <!-- TODO: add password field -->
                <x-input
                    wire:model="password"
                    type="password"
                    label="Contraseña"
                    :has-error="$errors->has('password')"
                />

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
                <x-button form="loginForm">Continuar</x-button>
                <!-- TODO: add continue button to submit form -->
            </div>
            <div class="mt-3 flex flex-col gap-4">
                <hr />
                <div class="mt-4 text-center font-light text-neutral-500">
                    <div>
                        ¿Es la primera vez que utilizas StaySpot?
                        <!-- TODO: dispatch evento to show login modal -->
                        <button @click="showLoginModal = false; $dispatch('show-register-modal')" class="cursor-pointer text-neutral-800 hover:underline">Crear una cuenta</button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
