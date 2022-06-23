<?php
require 'conexao.php';
session_start();
if (isset($_SESSION["usuario"])) {
    header('Location:dashboard.php');
}
$message = "";
?>
<?php
if (isset($_POST['subb'])) {


    if (isset($_POST["email"]) && isset($_POST["senha"]) && $connection != null) {

        function limpar($valor)
        {
            $valor = trim($valor);
            $valor = stripslashes($valor);
            $valor = htmlspecialchars($valor);
            return $valor;
        }
        $usuario =  limpar($_POST['email']);

        $senha = limpar($_POST['senha']);

        $query = $connection->prepare("SELECT * FROM usuario WHERE email = ? AND senha=md5(?)");
        $query->execute(array($_POST["email"], $_POST["senha"]));
        $message = 'E-mail ou Senha estão incorretos';
        if ($query->rowCount()) {

            $user = $query->fetchALL(PDO::FETCH_ASSOC)[0];


            $_SESSION["usuario_activo"] = true;
            $_SESSION["usuario"] = array($user["nomeUsuario"], $user["adm"], $user["email"],$user["id"]);

            if ($user["adm"] == 1) {
                echo "<script>window.location = 'dashboard.php'</Script>";
            } elseif ($user["adm"] == 2) {

                echo "<script>window.location = 'dashboard.php'</Script>";
            } else {
                echo "<script>window.location = 'cliente.php'</Script>";
            }
        } else {
        }
    } else {
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="estilo.css">
    <title>Autenticacao</title>
    <style>
        .form {
            text-align: center;
            font-size: 20pt;
        }
    </style>
</head>

<body>
    <form method="POST">
        <div class="container">
            <div class="Logo-form">

                <div class="form">

                    <a style="text-decoration: none;  " href="index1.php"> IMKWR</a>
                </div>



                <?php if (!empty($message)) : ?>
                    <div class="alert alert-danger mx-auto" style="text-align: center;">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>

                <div class="input-box">
                    <i class="fa fa-user"></i>
                    <input type="email" placeholder="Email do usuario" name="email" required>
                </div>

                <div class="input-box">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Password" name="senha" required>
                </div>



                <div class="input-box">
                    <input type="submit" value="entrar" name="subb">
                </div>

                <div class="sigup-text">
                    Não tens conta? <a href="criarUsuario.php">Criar conta!</a>
                </div>
    </form>
    </div>

    </div>
</body>

</html>