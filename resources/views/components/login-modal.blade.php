<x-modal>
    <x-slot:title>
        <div class="text-lg font-semibold">Iniciar sesión</div>
    </x-slot:title>
    <div class="flex flex-col gap-4">
        <div>
          <div class="text-2xl font-bold">
              Bienvenido de vuelta
          </div>
          <div class="font-light text-neutral-500 mt-2">
              ¡Inicia sesión en tu cuenta!
          </div>
        </div>

        <x-input label="Email" required />
        <x-input label="Contraseña" required />
    </div>
</x-modal>
