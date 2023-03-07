@extends('layout/app')

@section('titulo')

    {{'Página Setup'}}

@stop

@section('conteudo')

    <div class="container">
        <div class="row m-5">
            <div class="col-sm-6 col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div style="background-color: #02b;" class="card p-4 text-center">

                    <h3>SETUP</h3>

                    <div class="text-center m-2">
                        <a href="{{ route('resetdb') }}" class="btn btn-primary">Reiniciar</a>
                    </div>

                    <div class="text-center m-2">
                        <a href="{{ route('inserirusuarios') }}" class="btn btn-primary">Inserir usuários</a>
                    </div>

                    <div class="text-center m-2">
                        <a href="{{ route("inserirprodutos") }}" class="btn btn-primary">Inserir produtos</a>
                    </div>


                    <div class="text-center m-2">
                        <a href="{{ route("paginaInicial") }}" class="btn btn-primary">Voltar</a>
                    </div>

                </div>
            </div>

            @if (isset($dados))

                @include('layout.mensagem')

            @endif

        </div>
    </div>

@endsection
