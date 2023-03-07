@extends('layout/app')

@section('titulo')

    {{'Página Subtrair'}}

@stop

@section('conteudo')

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-4 col-sm-8 offset-sm-2 col-12">
                <div style="background-color: #02b;" class="card p-4 text-center">

                    <h4>{{ $produto->designacao }}</h4>

                    <p>Quantidade atual: {{ $produto->quantidade }}</p>

                    <hr/>

                    <form action="{{ route("subtrair", $produto->id_produto) }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-4 offset-4 col-lg-2 offset-lg-5">
                                <input type="number"
                                    name="count_quantidade"
                                    class="form-control text-center"
                                    value="1"
                                    min="1"
                                    max="1000">
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route("home") }}" class="btn btn-primary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Subtrair</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
