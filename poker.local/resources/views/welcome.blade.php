<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CyberPoker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=akshar:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div id="app" class="bg-bottom bg-no-repeat bg-cover flex items-center justify-center min-h-screen" style="background-image: url('{{ Vite::asset('resources/img/bg.jpg') }}')">
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
