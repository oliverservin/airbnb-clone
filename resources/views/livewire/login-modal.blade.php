<div x-data="{ showLoginModal: false }" x-on:show-login-modal.window="showLoginModal = true">
    <x-modal x-model="showLoginModal">
        <x-slot name="title">
            <div class="text-lg font-semibold">Iniciar sesión</div>
        </x-slot>
        <form wire:submit="login" id="loginForm" class="flex flex-col gap-4">
            <div>
                <div class="text-2xl font-bold">Bienvenido</div>
                <div class="mt-2 font-light text-neutral-500">Acceder a tu cuenta</div>
            </div>

            <div>
                <x-input wire:model="email" label="Email" type="email" />

                <!-- <p class="mt-2 text-rose-500">Mensaje de error</p> -->
            </div>

            <div>
                <x-input wire:model="password" label="Contraseña" type="password" />
            </div>
        </form>
        <x-slot name="footer">
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
                            class="text-neutral-800 hover:underline"
                        >
                            Crear una cuenta
                        </button>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-modal>
</div>
