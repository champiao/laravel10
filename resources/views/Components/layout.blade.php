<!DOCTYPE html>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }} - Controle de Séries</title>
    </head>
    <body style="background-color: #f5f5f5">
        <div class="container">
            <h1>{{ $title }}</h1>

            {{ $slot }}
        </div>
    </body>
</html>