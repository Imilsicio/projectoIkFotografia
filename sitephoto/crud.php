<?php require 'conexao.php';

if(isset($_POST['gravar'])){
	$sql = 'INSERT into clientes(nome, apelido,pacote, data, email,texto) values (nome,apelido, pacote, data, email,texto)';
$statement = $connection->prepare($sql);
$statement->execute();
$clientes=$statement->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_POST['actualizar'])) {
	$nome=$_POST['nome'];
	$apelido=$_POST['apelido'];
	$pacote=$_POST['pacote'];
	$data=$_POST['data'];
	$email= $_POST['email'];
	$texto=$_POST['texto'];

	$sql = 'UPDATE clientes set nome=:nome, apelido=:apelido,pacote=:pacote, data=:data, email=:email,texto=:texto where id=:id';
}
if(isset($_GET['apagar'])){
	$id =$_GET['apagar'];
	$sql = ('DELETE FROM clientes WHERE id=:id');
}
$sql = 'SELECT * FROM clientes';
$statement = $connection->prepare($sql);
$statement->execute();
$clientes=$statement->fetchAll(PDO::FETCH_OBJ);

