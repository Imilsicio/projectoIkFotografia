<?php
require 'conexao.php';
$id = $_GET['id'];

$sql = 'DELETE FROM cliente WHERE idc=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    $_SESSION["remove"]="Cliente removido";
  header("Location: Dashboard.php");
}