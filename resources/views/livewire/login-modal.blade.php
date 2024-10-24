<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
    public $email = '';

    public $password = '';

    public function login()
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

    public function authenticate()
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
        <x-slot:title>
            <div class="text-lg font-semibold">Iniciar sesión</div>
        </x-slot>
        <form id="loginForm" wire:submit="login" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido</div>
                <div class="mt-2 font-light text-neutral-500">Accede a tu cuenta</div>
            </div>

            <div>
                <x-input wire:model="email" label="Email" :has-error="$errors->has('email')" required />

                @error('email')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <x-input wire:model="password" type="password" label="Contraseña" :has-error="$errors->has('password')" required />

                @error('password')
                    <p class="mt-2 text-rose-500">{{ $message }}</p>
                @enderror
            </div>
        </form>
        <x-slot:footer>
            <div class="flex w-full flex-row items-center gap-4">
                <x-button type="submit" form="loginForm">Continuar</x-button>
            </div>
            <div class="mt-3 flex flex-col gap-4">
                <hr />
                <div class="mt-4 text-center font-light text-neutral-500">
                    <div>
                        ¿Es la primera vez que utilizas StaySpot?
                        <button
                            @click="$dispatch('show-register-modal'); showLoginModal = false;"
                            class="cursor-pointer text-neutral-800 hover:underline"
                        >
                            Crear una cuenta
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
