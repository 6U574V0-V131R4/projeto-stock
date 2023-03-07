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

class Gestao extends Controller
{
    //=====================
    # apresenta o menu inicial com a lista de produtos e respectivas quantidades
	public function home()
    {
		#*****************************************************************************************
		# ESSE É O GUARDA QUE IMPEDI DE BISBILHOTAREM
		#*****************************************************************************************
		if(!Session::has('id_usuario')){

            return redirect('/quadro_login');
		}
		#*****************************************************************************************

        $model_stock = new Stock;
		$dados['produtos'] = $model_stock->tudo();

        // echo '<pre>';
        // return print_r($dados['produtos'][0]->designacao);
        return view('stock.inicio', $dados);
	}

    //=====================
    # edita a designação do produto
	public function editar($id)
    {
		$model_stock = new Stock;
		$dados['produto'] = $model_stock->dados_produto($id)[0]; # first()

		return view('stock.editar', $dados);
	}

    //=====================
    # executa as operações de atualização dos dados do produto
	public function editarGuardar(Request $post, $id)
    {
		$model_stock = new Stock;

		$resultado = $model_stock->editar_produto($post, $id);

		# verifica se a operação foi concluida com sucesso
		if(!$resultado['resultado']){

			$dados['produto'] = $model_stock->dados_produto($id)[0]; # first()
			$dados['mensagem'] = $resultado['mensagem'];

			return view('stock.editar', $dados);
		}

		# volta a apresentar a página inicial com a tabela dos produtos
        return redirect('/home');
	}

    //=====================
    # apresenta o formulario para adicionar um novo produto
	public function novo()
    {
		return view('stock.novo');
	}

    //=====================
    # grava novo produto na base de dados
	public function novoGravar(Request $post)
    {
		$model_stock = new Stock;

		$resultado = $model_stock->novo_produto($post);

		if(!$resultado['resultado'])
        {
			return view('stock.novo', $resultado);
		}

		# volta a apresentar a página inicial com a tabela dos produtos
		return redirect('/home');
	}

    //=====================
    # elimina o produto
	public function eliminar($id, $resposta = false)
    {
		$model_stock = new Stock;

		# antes de existir resposta
		if(!$resposta)
        {
			$dados['produto'] = $model_stock->dados_produto($id)[0]; # first()

			# apresenta a view com o MODAL
			return view('stock.eliminar', $dados);
		}

		# quando a resposta é sim(true)
		$model_stock->eliminar($id);

		return redirect('/home');
	}

    //=====================
    # adiciona na quantidade de produto
	public function adicionar(Request $post, $id)
    {
        $model_stock = new Stock;

		if(is_null($post->count_quantidade))
		{
			# apresenta o formulário (MODAL)

			$dados['produto'] = $model_stock->dados_produto($id)[0]; # first()

			return view('stock.adicionar', $dados);
		}

		# adiciona o valor
		$model_stock->alterar_quantidade($id, $post->count_quantidade);

		return redirect('/home');
	}

    //=====================
    # subtrai a quantidade de produto
	public function subtrair(Request $post, $id)
    {
        $model_stock = new Stock;

		if(is_null($post->count_quantidade))
		{
			# apresenta o formulário (MODAL)

			$dados['produto'] = $model_stock->dados_produto($id)[0]; # first()

			return view('stock.subtrair', $dados);
		}

		# adiciona o valor
		$model_stock->alterar_quantidade($id, -$post->count_quantidade);

		return redirect('/home');
	}

    //=====================
    # apresenta a lista de movimentos
    public function movimentos()
    {
		# apresenta o formulário
		$model_stock = new Stock;

		$dados['movimentos'] = $model_stock->movimentos();

		return view('stock.movimentos', $dados);
	}

    //=====================
    # limpa a tabela de movimentos
	public function limparRegistroMovimentos()
    {
		$model_stock = new Stock;

		$model_stock->limpar_movimentos();

		return redirect('/movimentos');
	}
}
