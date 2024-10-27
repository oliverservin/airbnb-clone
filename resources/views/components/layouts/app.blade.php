<!DOCTYPE html>
<html lang="es" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-full antialiased">
        <div x-data="{ showRegisterModal: false }" x-on:show-register-modal.window="showRegisterModal = true">
            <x-modal x-model="showRegisterModal">
                <x-slot name="title">
                    Registro
                </x-slot>
                <form action="">
                    Formulario
                </form>
                <x-slot name="footer">
                    <button>Crear cuenta</button>
                </x-slot>
            </x-modal>
        </div>
        <x-navbar />
        <div class="pb-20 pt-28">{{ $slot }}</div>
    </body>
</html>
