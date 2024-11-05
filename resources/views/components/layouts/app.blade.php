<!DOCTYPE html>
<html lang="es" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

        @vite('resources/css/app.css')
    </head>
    <body class="h-full antialiased">
        @auth
            <livewire:rent-modal />
        @endauth

        @guest
            <livewire:register-modal />
            <livewire:login-modal />
        @endguest
        <x-navbar />
        <div class="pb-20 pt-28">{{ $slot }}</div>
    </body>
</html>
