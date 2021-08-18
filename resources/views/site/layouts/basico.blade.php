<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">   <!-- o helper asset sempre aponta para a pasta public -->   
    </head>
    <body>
        @include('site.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>