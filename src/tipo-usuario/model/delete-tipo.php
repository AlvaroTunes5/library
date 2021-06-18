<?php

    //instanciar o banco de dados
    include ('../../conexao/conn.php');

    //coleta do id  que sera excluido do nosso banco de dados 

    $ID = $_REQUEST['IDTIPO_USUARIO'];

    //criar a nossa query para interaçao do banco de dados 

    $sql = "DELETE FROM TIPO_USUARIO WHERE IDTIPO_USUARIO = $ID";

    //executar nossa consulta sql
    $resultado = $pdo->query($sql);

    //testar o retorno da consulta sql 

    if($resultado){
        $dados = array(
            'tipo' => 'success',
            'mensagem' =>'Registro excluido com sucesso!'
        );
    }else{
        $dados = array(
            'tipo' => 'error',
            'mensagem' =>'Registro excluido com sucesso!'
        );
    }
    echo json_encoe($dados);