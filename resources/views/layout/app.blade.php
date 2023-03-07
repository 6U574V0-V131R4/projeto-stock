<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            @yield('titulo')
        </title>
        <style>
            body, hr, pre{
                background-color: #282a36!important;
                color: #8be9fd!important;
                border-color: #8be9fd!important;
            }
        </style>
        <!-- boostrap (via CDN) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- fontawesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- css -->
        <link href= {{ asset('./css/main.css') }} rel="stylesheet">
        <!-- favicon -->
        <link rel="shortcut icon" href= {{ asset('./imagens/favicon.jpg') }} type="image/jpg">
    </head>
    <body>

        <div class="container-fluid p-0" style="width: 100vw;">
            <!-- cabeçalho e navegação -->
            @include('layout/cabecalho')

            <!-- conteúdo -->
            @yield('conteudo')

            <!-- rodapé -->
            @include('layout/rodape')
        </div>

        <!-- js (via CDN) -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>
