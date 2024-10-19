<div x-data="{ showLoginModal: false }" x-on:show-login-modal.window="showLoginModal = true">
    <x-modal x-model="showLoginModal">
        <x-slot:title>
            <div class="text-lg font-semibold">Iniciar sesión</div>
        </x-slot>
        <div class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido</div>
                <div class="mt-2 font-light text-neutral-500">Accede a tu cuenta</div>
            </div>

            <x-input label="Email" required />
            <x-input label="Contraseña" required />
        </div>
        <x-slot:footer>
            <div class="flex w-full flex-row items-center gap-4">
                <x-button>Continuar</x-button>
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
