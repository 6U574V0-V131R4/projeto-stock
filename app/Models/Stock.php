<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;   # POSSIBILITA USAR A QUERY SQL/BUILDER      (FIXO)

class Stock
{
    //=====================
    # vai buscar toda a informação dos produtos
	public function tudo()
    {
        return DB::select("SELECT * FROM produtos");
	}

    //=====================
    # retorna os dados do produto
	public function dados_produto($id)
    {
        return DB::select("SELECT * FROM produtos WHERE id_produto = $id");
    }

    //=====================
    # executa as operações de edição dos dados do produto
	public function editar_produto($dados_post, $id)
    {
        $dados = array(
            'id'         => $id,
            'designacao' => $dados_post->text_designacao
        );

        # verifica se já existe outro produto com o mesmo nome
        $resultado = DB::select("SELECT * FROM produtos WHERE id_produto <> :id AND designacao = :designacao", $dados);

		##################################   TRADUZINDO  ##################################
		###################################################################################
		# SELECIONE TODOS DA TABELA produtos
		# ONDE O id_produto SEJA DIFERENTE DO $id
		# E QUE A designacao SEJA IGUAL AO text_designacao
		###################################################################################

		if(count($resultado))
        {
			return array(
				'resultado' => false,
				'mensagem'  => 'Já existe outro produto com o mesmo nome.'
			);
		}

		# atualiza os dados do produto
        DB::select("UPDATE produtos SET designacao = :designacao WHERE id_produto = :id", $dados);

		return array(
			'resultado' => true,
			'mensagem'  => ''
		);
	}

    //=====================
    # grava um novo produto na base de dados,
	# caso não existir um com a mesma designação
	public function novo_produto($dados_post)
    {
		$dados = array(

            'designacao' => $dados_post->text_designacao
        );

        $resultado = DB::select("SELECT * FROM produtos WHERE designacao = :designacao", $dados);

		# já existe um produto com a mesma designação
		if(count($resultado))
        {
			return array(
				'resultado' => false,
				'mensagem'  => 'Já existe outro produto com a mesma designação.'
			);
		}

		# grava o novo produto na base de dados
		$produto = array(
			'designacao' => $dados_post->text_designacao,
			'quantidade' => 0
		);

        DB::select("INSERT INTO produtos VALUES(0, :designacao, :quantidade)", $produto);

		return array(
			'resultado' => true,
			'mensagem'  => ''
		);
	}

    //=====================
    # elimina o produto selecionado
	public function eliminar($id)
    {
        $dado = array(

            'id_produto' => $id
        );

        DB::select("DELETE FROM produtos WHERE id_produto = :id_produto", $dado);
	}

    //=====================
    # altera a quantidade do produto e registra o movimento
	public function alterar_quantidade($id, $post_count_QTD)
    {
		# altera a quantidade de produto

        $produto = array(

            'id'             => $id,
            'post_count_QTD' => $post_count_QTD
        );

        DB::select("UPDATE produtos SET quantidade = quantidade + :post_count_QTD WHERE id_produto = :id", $produto);

		# adiciona nova entrada em 'movimentos'
		$dados = array(
			'id_produto' => $id,
			'quantidade' => $post_count_QTD,
			'data_hora'  => date('Y-m-d H:i:s')
		);

        DB::select("INSERT INTO movimentos VALUES(0, :id_produto, :quantidade, :data_hora)", $dados);
	}

    //=====================
    # retorna toda a tabela de movimentos
	public function movimentos(){

        $resultados = DB::select("SELECT m.*, p.designacao FROM movimentos m JOIN produtos p ON m.id_produto = p.id_produto");

		return $resultados; # get()
	}

    //=====================
    # limpa os registros de movimentos
	public function limpar_movimentos()
    {
        DB::select("DELETE FROM movimentos");

        DB::select("ALTER TABLE movimentos AUTO_INCREMENT = 1");
	}
}
?>
