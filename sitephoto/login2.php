<?php
require("conexao.php");

if (isset($_POST["email"]) && isset($_POST["senha"]) && $connection != null) {

$usuario =addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

	$query = $connection->prepare("SELECT * FROM usuario WHERE email = ? AND senha=md5(?)");
	$query->execute(array($_POST["email"], $_POST["senha"]));
	$message = 'E-mail ou Senha estão incorretos';
	if ($query->rowCount()) {
		$user = $query->fetchALL(PDO::FETCH_ASSOC)[0];

		session_start();
		$_SESSION["usuario_activo"] = true;
		$_SESSION["usuario"] = array( $user["nomeUsuario"], $user["adm"],$user["email"], $user["id"]);

		if ($user["adm"] == 0) {
			echo "<script>window.location = 'contacto.php'</Script>";
		} else {
			
			echo "<script>window.location = 'contacto.php'</Script>";
		}
	} else {
 
		echo "dados errados";
	}
} else {
	echo "<script>window.location = 'indexx.php'</Script>";
}