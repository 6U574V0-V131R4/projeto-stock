@extends('layout/app')

@section('titulo')

    {{'Página Eliminar'}}

@stop

@section('conteudo')

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-4 col-sm-8 offset-sm-2 col-12">
                <div style="background-color: #02b;" class="card p-4 text-center">

                    <h4>{{ $produto->designacao }}</h4>

                    <p>Deseja mesmo eliminar ?</p>

                    <div class="pt-3 pb-3">
                        <a href="{{ route("home") }}" class="btn btn-primary">Cancelar</a>
                        <a href="{{ route("eliminar", array($produto->id_produto, 'true')) }}" class="btn btn-primary">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
