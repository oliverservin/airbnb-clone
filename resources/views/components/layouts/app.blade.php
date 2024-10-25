<!DOCTYPE html>
<html lang="es" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>

        <script defer src="https://unpkg.com/alpinejs-notify@latest/dist/notifications.min.js"></script>

        @vite('resources/css/app.css')
    </head>
    <body class="h-full antialiased">
        @persist('toast')
            <x-toast />
        @endpersist

        @guest
            <livewire:register-modal />
            <livewire:login-modal />
        @endguest

        <x-navbar />
        <div class="pb-20 pt-28">
            {{ $slot }}
        </div>
    </body>
</html>
