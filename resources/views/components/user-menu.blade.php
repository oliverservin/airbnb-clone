<div x-data="{ showDropdown: false }" class="relative">
    <div class="flex flex-row items-center gap-3">
        <div
            class="hidden cursor-pointer rounded-full px-4 py-3 text-sm font-semibold transition hover:bg-neutral-100 md:block"
        >
            Pon tu casa en StayStop
        </div>
        <button
            @click="showDropdown = !showDropdown"
            class="flex cursor-pointer flex-row items-center gap-3 rounded-full border-[1px] border-neutral-200 p-4 transition hover:shadow-md md:px-2 md:py-1"
        >
            <x-icon.bars class="size-4" />
            <div class="hidden md:block">
                <x-avatar />
            </div>
        </button>
    </div>
    <div
        x-cloak
        x-show="showDropdown"
        class="absolute right-0 top-12 w-[40vw] overflow-hidden rounded-xl bg-white text-sm shadow-md md:w-3/4"
    >
        <div class="flex cursor-pointer flex-col">
            @guest
                <x-menu-item>Iniciar sesión</x-menu-item>
                <x-menu-item>Registrarse</x-menu-item>
            @endguest
        </div>
    </div>
</div>
