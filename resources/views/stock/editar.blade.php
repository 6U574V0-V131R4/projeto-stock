@extends('layout/app')

@section('titulo')

    {{'Página Editar'}}

@stop

@section('conteudo')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-4 col-sm-8 offset-sm-2 col-12">
                <div style="background-color: #02b;" class="card p-4">
                    <h3>{{ $produto->designacao }}</h3>
                    <hr/>
                    <form action="{{ route("editarguardar", $produto->id_produto) }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Designação:</label>
                            <input type="text"
                                name="text_designacao"
                                class="form-control"
                                placeholder="Nome do produto"
                                value="{{ $produto->designacao }}"
                                required>
                        </div>

                        @if(isset($mensagem))
                            <div class="alert alert-danger text-center">
                                {{ $mensagem; }}
                            </div>
                        @endif

                        <div class="text-center">
                            <a href="{{ route("home"); }}" class="btn btn-primary">Cancelar</a>
                            <button class="btn btn-primary" type="submit">Atualizar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
