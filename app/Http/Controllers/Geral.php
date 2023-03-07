<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;         # POSSIBILITA USAR O POST                   (FIXO)
use Illuminate\Support\Facades\Hash; # POSSIBILITA USAR O HASHING                (FIXO)
use Illuminate\Support\Facades\Mail; # POSSIBILITA USAR O EMAIL                  (FIXO)
use Session;                         # POSSIBILITA USAR A SESSÃO                 (FIXO)

use App\Mail\meuEmail;               # POSSIBILITA USAR A CLASSE DO EMAIL        (VARIÁVEL)
use App\classes\minhaClasse;         # POSSIBILITA USAR A NOSSA PRÓPRIA CLASSE   (VARIÁVEL)

use App\Models\Basedados;            # POSSIBILITA USAR O MODEL                  (VARIÁVEL)
use App\Models\Stock;                # POSSIBILITA USAR O MODEL                  (VARIÁVEL)
use App\Models\Usuarios;             # POSSIBILITA USAR O MODEL                  (VARIÁVEL)

class Geral extends Controller
{
    //========================================================
    # DEFAULT
    //========================================================
    //=====================
    public function index()
	{
		# no caso de existir uma sessão ativa, apresenta o menu inicial
		if(Session::has('id_usuario'))
        {
			// $this->menuInicial();
            return redirect('/menu_inicial');
		}

        return redirect('/quadro_login');
	}

    //=====================
    public function quadroLogin(){
		# se existir uma sessão ativa, salta para o quadro do menu inicial
		if(Session::has('id_usuario'))
        {
			// $this->menuInicial();
            return redirect('/menu_inicial');
		}

		return view('usuarios/login');
	}

    //=====================
    public function menuInicial(){
		# apresenta o menu inicial, no caso de existir uma sessão ativa
		if(!Session::has('id_usuario'))
        {
            return redirect('/quadro_login');
		}

        return redirect('/home');
	}

    //=====================
    # verifica se foi feito login correto
	public function verificarlogin(Request $post){

		# verifica se foi feito corretamente o login
		if(Session::has('id_usuario')){

            return redirect('/menu_inicial');

		} else {

			# vai verificar se foi feito o login corretamente
            $model_usuario = new Usuarios;

			if($model_usuario->verificar_login($post)){

                return redirect('/menu_inicial');

			} else {

				# login inválido
                return redirect('/login_invalido');
			}
		}
	}

    //=====================
    # apresenta uma mensagem a informar que o login está incorreto
	public function loginInvalido(){
		if(Session::has('id_usuario')){

			return redirect('/menu_inicial');

		} else {

			$dados = array(
				'mensagem' => 'Login inválido.',
				'tipo'     => 'danger'
			);

			return view('usuarios/login', compact('dados'));
		}
	}

    //=====================
    # executa o logout do usuário
	public function logout(){
		if(Session::has('id_usuario')){

			# remove os dados da sessão
			Session::flush();
		}

		# volta ao quadro de login
		return redirect('/menu_inicial');
	}

    ###############################################################################################

    //=====================
    # executa o setup
	public function setup(){

        return view('setup.setup');
	}

    //=====================
    # limpa todos os dados da base de dados
	public function resetdb(){

        $model_basedados = new Basedados;
        $model_basedados->reset();

        $dados = array(
            'mensagem' => 'Sistema de base de dados reiniciado com sucesso.',
            'tipo'     => 'success'
        );

        return view('setup.setup', compact('dados'));
	}

    //=====================
    # vai inserir 3 usuarios na base de dados
	public function inserirusuarios(){

        $model_basedados = new Basedados;
        $model_basedados->inserir_usuarios();

        $dados = array(
            'mensagem' => 'Inseridos 3 usuários com sucesso.',
            'tipo'     => 'success'
        );

        return view('setup.setup', compact('dados'));
	}

    //=====================
    # vai inserir 3 usuarios na base de dados
	public function inserirprodutos(){

        $model_basedados = new Basedados;
        $model_basedados->inserir_produtos();

        $dados = array(
            'mensagem' => 'Inseridos produtos com sucesso.',
            'tipo'     => 'success'
        );

        return view('setup.setup', compact('dados'));
	}
}
