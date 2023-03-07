@extends('layout/app')

@section('titulo')

    {{'Página Novo'}}

@stop

@section('conteudo')

    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-4 col-sm-8 offset-sm-2 col-12">
                <div style="background-color: #02b;" class="card p-4">

                    <h3>Novo produto</h3>
                    <hr>
                    <form action="{{ route("novogravar") }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">

                            <label>Designação:</label>

                            <input type="text"
                                name="text_designacao"
                                class="form-control"
                                placeholder="Designação"
                                required>
                        </div>

                        @if(isset($mensagem))

                            <div class="alert alert-danger text-center">
                                {{ $mensagem; }}
                            </div>

                        @endif

                        <div class="text-center">

                            <a href="{{ route("home") }}" class="btn btn-primary">Cancelar</a>

                            <button type="submit" class="btn btn-primary">Gravar</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
