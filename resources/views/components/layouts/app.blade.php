<!DOCTYPE html>
<html lang="es" class="h-full">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>

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
