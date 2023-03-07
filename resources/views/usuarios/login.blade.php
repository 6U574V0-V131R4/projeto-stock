@extends('layout/app')

@section('titulo')

    {{'Página Login'}}

@stop

@section('conteudo')

    <div class="container mt-5 mb-5">
        <div class="row">

            @if (isset($dados))

                @include('layout.mensagem')

            @endif

            <div class="col-sm-6 col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">

                <div style="background-color: #02b;" class="card p-4 text-center">

                    <h3>Login</h3>

                    <form action="{{ route("verificarlogin") }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="text"
                                name="text_usuario"
                                class="form-control"
                                placeholder="Usuário"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="password"
                                name="text_senha"
                                class="form-control"
                                placeholder="Senha"
                                required>
                        </div>



                        <div class="text-right">
                            <button class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
