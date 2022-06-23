<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nomeUsuario = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.php'</script>";
}
$erroNomeUsuario="";
$erroEmail="";
$erroSenha="";


require 'conexao.php';
$sql = 'SELECT * FROM  usuario ';
$statement = $connection->prepare($sql);
$statement->execute();
$cliente = $statement->fetchAll(PDO::FETCH_OBJ);
$message = '';
$message1 = '';

if (isset($_POST['submi'])) {
    

    if (empty($_POST['email'])) {
        $erroEmail = "Por faor, preencha um e-mail";
    }else{
    $email = limpar($_POST['email']);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
       $erroEmail = "E-mail invalido";
    }

    }
    if (empty($_POST['senha'])) {
        $erroSenha = "Por faor, preencha uma senha";
    }else{
    $senha = limpar($_POST['senha']);
    if (strlen($senha)<6){
        $erroSenha = "Senha deve ter 6 digitos";
     }
    }
    if (empty($_POST['nomeUsuario'])) {
        $erroNomeUsuario = "Por faor, preencha um nome";
    }else{
    $nomeUsuario = $_POST['nomeUsuario'];
    if (!preg_match("/^[a-zA-Z]*$/",$nomeUsuario)) {
       $erroNomeUsuario =  "Apenas Letras";
    }
    }
    if($erroSenha == true || $erroEmail == true ){
        $message = 'Nao inserido';
        

}else{

try {

    $sql = "INSERT INTO usuario(email,senha, nomeUsuario,adm) VALUES(:email,md5(:senha), :nomeUsuario,2)";
    $statement = $connection->prepare($sql);
    if (
        $statement->execute([':email' => $email, ':senha' => $senha, ':nomeUsuario' => $nomeUsuario])
    ) {
        
        $message = 'Fotografo Adicionado';
      
    } else {
        $message = 'Nao inserido';
    }
} catch (PDOException $erro) {
    $message1 = 'Usuario nao criado!!! O e-mail inserido ja existe ';
}
}
}
function limpar($valor)
    {
        $valor = trim($valor);
        $valor = stripslashes($valor);
        $valor = htmlspecialchars($valor);
        return $valor;
    }

?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | IMKWR</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <?php if ($adm == 1) : ?>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <h3 class="col-md-auto"><a href="">IK Fotografia</a></h3>
                </div>

                <ul class="list-unstyled components">
                    <p style="text-align: center;">Bem-Vindo <span style="font-weight:400 ; text-transform: capitalize;"><?php echo $nomeUsuario; ?></span></p>
                    <li>
                        <a href="Dashboard.php">Dashboard</a>
                    </li>

                    <li class="active">


                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Evento</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>

                                <a href="casamento.php">Casamento</a>

                            </li>
                            <li>
                                <a href="shoot.php">Shoots</a>
                            </li>
                            <li>
                                <a href="outros.php">Outros</a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestao</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                                <a href="criarFotografo.php">Adicionar Fotografos</a>
                            </li>
                            <li>
                                <a href="listarFotografo.php">Listar Fotografos</a>
                            </li>
                            <li>
                                <a href="criarMarcacao.php">Marcações</a>
                            </li>
                        </ul>
                    </li>

                </ul>


            </nav>
    <!-- Page Content  -->
    <div id="content">


<div class="container my-4">
    <div style="text-align: right; margin: 10px 0px" class="">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>


        <a onclick="return confirm('Tens a certeza que deseja Sair?')" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" href="logout.php" class='btn btn-info '>
            Logout
        </a>
    </div>





        <div class="container mb-3">

            <form method="POST">
                <div class="container my-4" >
                    <?php if (!empty($message)) : ?>
                        <div class=" alert alert-success col-md-5 mx-auto" style="text-align: center;" >
                            <?= $message; ?>
                        </div>

                    <?php endif; ?>
                    <?php if (!empty($message1)) : ?>
                        <div class="alert alert-danger col-md-5 mx-auto" style="text-align: center;" >
                            <?= $message1; ?>
                        </div>

                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-5 mx-auto">
                            <div class="card">

                                <div class="card-header">

                                    <h3 class="card-title">Criar Conta</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class=" col-md-12 mb-3 mx-auto ">
                                            <label for="validationServer04">Nome</label>
                                            <input type="text"  <?php if(isset($_POST['nomeUsuario'])){ echo "value='".$_POST['nomeUsuario']."'";}?> class="form-control" id="validationTextarea" name="nomeUsuario" aria-describedby="validationServer03Feedback" required>
                                            <br><span class="erro"><?php echo $erroNomeUsuario; ?></span>
                                        </div>
                                        <div class=" col-md-12 mb-3  mx-auto">
                                            <label for="validationServer03">Email</label>
                                            <input type="email"<?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";}?> class="form-control" id="validationTextarea" name="email" aria-describedby="validationServer03Feedback" required>
                                            <br><span class="erro"><?php echo $erroEmail; ?></span>
                                        </div>
                                        <div class="col-md-12 mb-3   mx-auto">
                                            <label for="validationServer04">Senha</label>
                                            <input type="password" class="form-control" id="validationTextarea" name="senha" aria-describedby="validationServer03Feedback" required>
                                            <br><span class="erro"><?php echo $erroSenha ; ?></span>
                                        </div>

                                    </div>
                                    <button class="btn btn-info" type="submit" name="submi">Criar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>









    </div>






    </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
   <?php else : ?>
        <?php echo "<script>window.location = 'index1.php'</script>"; ?>
    <?php endif; ?>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>