<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout()
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        $this->redirect(route('home'), navigate: true);
    }
} ?>

<!-- TODO: Create alpine with `showDropdown` -->
<div x-data="{ showDropdown: false }" class="relative">
    <div class="flex flex-row items-center gap-3">
        <!-- TODO: Add publish button -->

        <!-- TODO: Toggle `showDropdown` on click -->
        <button
            @click="showDropdown = !showDropdown;"
            class="flex cursor-pointer flex-row items-center gap-3 rounded-full border-[1px] border-neutral-200 p-4 transition hover:shadow-md lg:px-2 lg:py-1"
        >
            <!-- TODO: add `bars` icon with `size-4` -->
            <x-icon.bars class="size-4" />
            <div class="hidden lg:block">
                <!-- TODO: add `avatar` component -->
                <x-avatar />
            </div>
        </button>
    </div>
    <!-- TODO: show if `showDropdown` -->
    <!-- TODO: add `x-cloak` -->
    <div
        x-show="showDropdown"
        x-cloak
        class="absolute right-0 top-12 w-[40vw] overflow-hidden rounded-xl bg-white text-sm shadow-md lg:w-56"
    >
        <!-- TODO: hide dropdown on click away -->
        <div @click.away="showDropdown = false" class="flex flex-col">
            <!-- TODO: add `menu-item` component -->
            <!-- TODO: add login button -->
            <!-- TODO: add register button -->
            @guest
                <x-menu-item @click="$dispatch('show-register-modal')">Registrarse</x-menu-item>
                <x-menu-item @click="$dispatch('show-login-modal')">Iniciar sesión</x-menu-item>
            @endguest

            @auth
                <x-menu-item wire:click="logout">Cerrar sesión</x-menu-item>
            @endauth
        </div>
    </div>
</div>
