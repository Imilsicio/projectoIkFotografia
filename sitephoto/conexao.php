<?php 
$editar_estado = false;

    $server = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $banco = "ikfotografia";

    try{
        $connection = new PDO("mysql:host=$server;dbname=$banco", $usuario, $senha);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo "Ocorreu um erro de conexao: {$erro->getMessage()}";
        $connection = null;
    }
