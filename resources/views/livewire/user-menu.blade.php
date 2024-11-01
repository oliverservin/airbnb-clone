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
}

?>

<div x-data="{ showDropdown: false }" class="relative">
    <div class="flex flex-row items-center gap-3">
        <button
            @auth
                @click="$dispatch('show-rent-modal')"
            @else
                @click="$dispatch('show-login-modal')"
            @endif
            class="hidden rounded-full px-4 py-3 text-sm font-semibold transition hover:bg-neutral-100 lg:block"
        >
            Pon tu casa en StayStop
        </button>
        <button
            @click="showDropdown = !showDropdown"
            class="flex flex-row items-center gap-3 rounded-full border-[1px] border-neutral-200 p-4 transition hover:shadow-md lg:px-2 lg:py-1"
        >
            <x-icon.bars class="size-4" />
            <x-avatar class="hidden lg:block" />
        </button>
    </div>
    <div
        x-cloak
        x-show="showDropdown"
        class="absolute right-0 top-12 w-[40vw] overflow-hidden rounded-xl bg-white text-sm shadow-md lg:w-52"
    >
        <div @click.away="showDropdown = false" class="flex flex-col">
            @auth
                <x-menu-item :href="route('properties')" wire:navigate>Mis propiedades</x-menu-item>
                <x-menu-item @click="$dispatch('show-rent-modal')">Pon tu casa en StayStop</x-menu-item>
                <hr />
                <x-menu-item wire:click="logout">Cerrar sesión</x-menu-item>
            @else
                <x-menu-item @click="$dispatch('show-register-modal')">Registrarse</x-menu-item>
                <x-menu-item @click="$dispatch('show-login-modal')">Iniciar sesión</x-menu-item>
            @endauth
        </div>
    </div>
</div>
