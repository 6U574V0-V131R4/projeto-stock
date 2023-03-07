@extends('layout/app')

@section('titulo')

    {{'Página Início'}}

@stop

@section('conteudo')

    <div class="container mt-3 mb-3">
        <div class="col-sm-2 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div style="width: 75%" class="col-sm-8 col-md-6 col-lg-6">
                    <a href="{{ route("novo") }}" class="btn btn-primary">Novo produto...</a>
                    <a href="{{ route("movimentos") }}" class="btn btn-primary">Movimentos...</a>
                </div>
                <div style="width: 25%" class="col-sm-4 col-md-6 col-lg-6 text-right">
                <a href="{{ route("logout"); }}" class="btn btn-primary">Logout</a>
                </div>
            </div>
    
            <hr/>
    
            <div class="mt-3 mb-3">
    
                @if(count($produtos) == 0)
                    <p class="text-center">Não existem produtos registrados.</p>
                @else
    
                    <table class="table table-striped">
    
                        <thead class="thead-dark">
                            <th class="text-left">Produto</th>
                            <th class="text-center">Quantidade</th>
                            <th></th>
                        </thead>
    
                    @foreach($produtos as $produto)
    
                        <tr>
    
                            <td class="text-left">
                                <a href="{{ route("editar", $produto->id_produto) }}" class="mr-3"><i class="fa fa-pencil"></i></i></a>
                                {{ $produto->designacao }}
                            </td>
    
                            <td class="text-center">
                                {{ $produto->quantidade }}
                            </td>
    
                            <td class="text-right">
                                <a href="{{ route("adicionar", $produto->id_produto) }}" class="mr-3"><i class="fa fa-plus-square"></i></a>
                                <a href="{{ route("subtrair", $produto->id_produto) }}" class="mr-3"><i class="fa fa-minus-square"></i></a>
                                <a href="{{ route("eliminar", $produto->id_produto) }}" class="mr-3"><i class="fa fa-trash"></i></a>
                            </td>
    
                        </<i class="fa fa-pencil"></i>
    
                    @endforeach
    
                    </table>
    
                    <hr/>
                    <p>Total produtos: <b>{{ count($produtos); }}</b></p>
    
                @endif
            </div>
        </div>
    </div>

@endsection
