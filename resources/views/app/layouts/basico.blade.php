<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">   <!-- o helper asset sempre aponta para a pasta public --> 
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/logo.png') }}">
    </head>
    <body>
        @include('app.layouts._partials.topo')
        <main class="py-4">
            @yield('conteudo')
        </main>
    </body>
</html>