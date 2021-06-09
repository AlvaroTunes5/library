<?php


    include('../../conexao/conn.php');


    $requestData = $_REQUEST;


    if(empty($requestData['DESCRICAO'])){

        $dados = array(
            "tipo" => "error",
            "mensagem" => "Existe(m) campo(s) obrigatório(s) não preenchido(s)"
        );
    } else {

        $IDTIPO_USUARIO = isset($requestData['IDTIPO_USUARIO']) ? $requestData['IDTIPO_USUARIO'] : '';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';


        if($operacao == 'insert'){
            try {
                $stmt = $pdo->prepare('INSERT INTO TIPO_USUARIO (DESCRICAO) VALUES (:descricao)');
                $stmt->execute(array(
                    ':descricao' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => "success",
                    "mensagem" => "Tipo de usuário cadastrado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possível efetuar o cadastro do tipo de usuário."
                );
            }
        } else {

            try {
                $stmt = $pdo->prepare('UPDATE TIPO_USUARIO SET DESCRICAO = :descricao WHERE IDTIPO_USUARIO = :id');
                $stmt->execute(array(
                    ':id' => $IDTIPO_USUARIO,
                    ':descricao' => utf8_decode($requestData['DESCRICAO'])
                ));
                $dados = array(
                    "tipo" => "success",
                    "mensagem" => "Tipo de usuário alterado com sucesso."
                );
            } catch (PDOException $e) {
                $dados = array(
                    "tipo" => "error",
                    "mensagem" => "Não foi possível efetuar a alteração do tipo de usuário."
                );
            }
        }
    }

    echo json_encode($dados);