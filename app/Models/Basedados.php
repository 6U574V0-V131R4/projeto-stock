<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;   # POSSIBILITA USAR A QUERY SQL/BUILDER      (FIXO)

class Basedados
{
    //=====================
    # faz um reset da base de dados
    public function reset(){

        # elimina todos os dados das tabelas
        DB::select("DELETE FROM usuarios"); # Usando SQL Direto
        DB::select("DELETE FROM produtos"); # Usando SQL Direto

        # recomeça o AUTO_INCREMENT
        DB::select("ALTER TABLE usuarios AUTO_INCREMENT = 1");
        DB::select("ALTER TABLE produtos AUTO_INCREMENT = 1");
        DB::select("ALTER TABLE movimentos AUTO_INCREMENT = 1");
    }

    //=====================
    # insere usuarios na base de dados
    public function inserir_usuarios(){

        # limpa a tabela dos usuários
        DB::select("DELETE FROM usuarios"); # Usando SQL Direto
        DB::select("ALTER TABLE usuarios AUTO_INCREMENT = 1");

        $dados = array(
            'usuario' => 'admin',
            'senha'   => md5('admin')
        );

        DB::select("INSERT INTO usuarios VALUES(0, :usuario, :senha)", $dados);

        $dados = array(
            'usuario' => 'ana',
            'senha'   => md5('ana')
        );

        DB::select("INSERT INTO usuarios VALUES(0, :usuario, :senha)", $dados);

        $dados = array(
            'usuario' => 'rui',
            'senha'   => md5('rui')
        );

        DB::select("INSERT INTO usuarios VALUES(0, :usuario, :senha)", $dados);
    }

    //=====================
    # insere alguns produtos na base de dados
    # primeiro apaga os dados da tabela dos produtos e coloca o auto_increment em 1
    public function inserir_produtos(){

        DB::select("DELETE FROM usuarios"); # Usando SQL Direto
        DB::select("ALTER TABLE produtos AUTO_INCREMENT = 1");

        $dados = array(
        	array(
        		'designacao' => 'CPUs',
        		'quantidade' => 10
        	),
        	array(
        		'designacao' => 'Memórias',
        		'quantidade' => 20
        	),
        	array(
        		'designacao' => 'Monitores',
        		'quantidade' => 30
        	),
        	array(
        		'designacao' => 'Discos rígidos',
        		'quantidade' => 40
        	)
        );

        // $this->db->insert_batch('produtos', $dados); # Usando Query Builder (ATALHO)

        foreach($dados as $dado)
        {
            DB::select("INSERT INTO produtos VALUES(0, :designacao, :quantidade)", $dado);
        }

        # adiciona 10 produtos de cada um destes elementos
        # limpa a base de dados dos movimentos
        DB::select("DELETE FROM movimentos"); # Usando SQL Direto
        DB::select("ALTER TABLE movimentos AUTO_INCREMENT = 1");

        $dados = array(
            array(
                'id_produto' => 1,
                'quantidade' => 10,
                'data_hora'  => date('Y-m-d H:m:s')
            ),
            array(
                'id_produto' => 2,
                'quantidade' => 20,
                'data_hora'  => date('Y-m-d H:m:s')
            ),
            array(
                'id_produto' => 3,
                'quantidade' => 30,
                'data_hora'  => date('Y-m-d H:m:s')
            ),
            array(
                'id_produto' => 4,
                'quantidade' => 40,
                'data_hora'  => date('Y-m-d H:m:s')
            )
        );
        // $this->db->insert_batch('movimentos', $dados); # Usando Query Builder (ATALHO)

        foreach($dados as $dado)
        {
            DB::select("INSERT INTO movimentos VALUES(0, :id_produto, :quantidade, :data_hora)", $dado);
        }
    }
}
?>
