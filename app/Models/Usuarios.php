<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;   # POSSIBILITA USAR A QUERY SQL/BUILDER      (FIXO)
use Session;                         # POSSIBILITA USAR A SESSÃO                 (FIXO)

class Usuarios
{
    //=====================
    # verifica se os dados introduzidos no quadro de login são válidos
    public function verificar_login($dados_post){

        $parametros = array(
            'usuario' => $dados_post->text_usuario,
            'senha'   => md5($dados_post->text_senha)
        );

        $resultado = DB::select("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha", $parametros); # get()

        if(!count($resultado)){
            # login inválido
            return false;

        } else {
            # login válido

            # abre a sessão com os dados do usuario
            $dados_usuario = $resultado[0]; # first()
            // echo '<pre>';
            // print_r($dados_usuario);

            Session::put('id_usuario', $dados_usuario->id_usuario);

            Session::put('usuario', $dados_usuario->usuario);

            return true;
        }
    }
}
?>
