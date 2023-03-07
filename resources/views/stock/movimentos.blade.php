@extends('layout/app')

@section('titulo')

    {{'Página Movimentos'}}

@stop

@section('conteudo')

    <div class="container pt-3 pb-3">
        <div class="row">
            <div style="width: 25%" class="col-sm-6 col-md-6 col-lg-6" style="background-color: red">
                <a href="{{ route("home") }}" class="btn btn-primary">Voltar</a>
            </div>
            <div style="width: 75%" class="col-sm-6 col-md-6 col-lg-6 text-right" style="background-color: yellow">
                <a href="{{ route("limparregistromovimentos") }}" class="btn btn-primary">Limpar registro de movimentos</a>
            </div>
        </div>

        <hr/>

        @if(!count($movimentos))
            <div class="text-center pt-2 pb-2">
                Não existem movimentos.
            </div>
        @else

            <table class="table table-striped">

                <thead class="thead-dark">
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Movimento</th>
                </thead>

                @foreach($movimentos as $movimento)
                    <tr>
                        <td>{{ $movimento->data_hora }}</td>
                        <td>{{ $movimento->designacao }}</td>
                        <td>{{ $movimento->quantidade }}</td>
                    </tr>
                @endforeach

            </table>

            <hr/>

            <p>Movimentos: <b>{{ count($movimentos) }}</b></p>

        @endif
    </div>

@endsection
