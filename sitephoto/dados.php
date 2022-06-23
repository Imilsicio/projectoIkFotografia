<?php 
require 'conexao.php';

$id =$_GET['id'];
$sql = 'SELECT *FROM clientes WHERE idcliente =:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$clientes =$statement->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST['nome']) && isset($_POST['apelido']) && isset($_POST['pacote']) && isset($_POST['data']) && isset($_POST['email']) && isset($_POST['texto']) ) {
   $nome= $_POST['nome'];
   $apelido = $_POST['apelido'];
   $pacote= $_POST['pacote'];
   $data = $_POST['data'];
   $email = $_POST['email'];
   $texto = $_POST['texto'];

$sql = 'SELECT * FROM clientes';
$statement = $connection->prepare($sql);
$statement->execute();
$clientes = $statement->fetchAll(PDO::FETCH_OBJ);

}
?>