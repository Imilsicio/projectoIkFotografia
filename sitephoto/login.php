<?php
session_start();
require("conexao.php");
// print_r($_SESSION["usuario"]);
// die;
if (isset($_SESSION["usuario"])) {
	header('Location:dashboard.php');
}


if (isset($_POST["email"]) && isset($_POST["senha"]) && $connection != null) {
	
$usuario =addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

	$query = $connection->prepare("SELECT * FROM usuario WHERE email = ? AND senha=md5(?)");
	$query->execute(array($_POST["email"], $_POST["senha"]));
	if ($query->rowCount()) {
		$user = $query->fetchALL(PDO::FETCH_ASSOC)[0];

		
		$_SESSION["usuario_activo"] = true;
		$_SESSION["usuario"] = array( $user["nomeUsuario"], $user["adm"],$user["email"]);

		if ($user["adm"] == 1) {
			echo "<script>window.location = 'dashboard.php'</Script>";

		}
		 elseif($user["adm"] == 2)
		 {
			
			echo "<script>window.location = 'dashboard.php'</Script>";
		}
		else{
			echo "<script>window.location = 'cliente.php'</Script>";

		}
	} else {

		
        header('Location:index.php');
		$message = 'Senha errada';
	}
} else {
	echo "<script>window.location = 'index.php'</Script>";
}
