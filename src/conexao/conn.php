<?php

    // Declarar as variaveis necessarias para gerar a minha conexão com o banco de dados, conexão PDO!!!

    $hostname = "fdb30.awardspace.net";
    $dbname = "3762223_library";
    $username = "3762223_library";
    $password = "Alv@ARO2003";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='. $dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexão realizada com sucesso';
    }catch (PDOException $e){
        echo 'Error: '.$e->getMessage();
    }