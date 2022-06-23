<?php
session_start();
require 'conexao.php';
$message = '';
$message1 = '';
if (isset($_SESSION["usuario"])) {


  $id = $_SESSION["usuario"];

  $nomeUsuario = $_SESSION["usuario"][0];


  $sql = 'SELECT * FROM  usuario '; 
  $statement = $connection->prepare($sql);
  $statement->execute();
  $cliente = $statement->fetchAll(PDO::FETCH_OBJ);
}
if (isset($_POST['submeter'])) {


  if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");




    if (isset($_POST['id']) && isset($_POST['evento']) && isset($_POST['pacote']) && isset($_POST['data'])  && isset($_POST['texto'])) {

      $evento = $_POST['evento'];
      $pacote = $_POST['pacote'];
      $data = $_POST['data'];

      $texto = $_POST['texto'];
      $id = $_POST['id'];
     

      $sql = 'INSERT INTO cliente(idcliente,evento, pacote,data,texto, status,datamarc) VALUES(:id,:evento, :pacote,:data,:texto,"pendente",now())';
      $statement = $connection->prepare($sql);
      if (
        $statement->execute([':id' => $id, ':evento' => $evento, ':pacote' => $pacote, ':data' => $data, ':texto' => $texto])
      ) {
        $message1 = 'Dado inserido com Sucesso';
      }
    }
  } else {
    $message = 'Por favor, inicie a Sessao';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  
  <title>Contacto</title>
</head>

<body>
  <header>


    <div class="container" id="nav-container">
      <!-- add essa class -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="height:70px ;"><a href="index1.php">
      <img  src="img/logo-ik.png" style="width:14% ;   margin-left: 200px;" alt=""></a>
        <!-- <a class="navbar-brand" href="index.html">IK || Photography</a> -->
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="index1.php">Home</span></a>
            <a class="nav-item nav-link" href="servicos.php">Serviços</a>
            <a class="nav-item nav-link" href="Sobre.php">Sobre</a>
            <a class="nav-item nav-link" href="Galeria.php">Galeria</a>
            <a class="nav-item nav-link" href="contacto.php">contacto</a>


            <?php if (!isset($_SESSION["usuario"])) : ?>
              <div class="dropdown d-flex justify-content-end ">
                <button class=" btn btn-info dropdown-toggle col-md-12"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </button>


                <div class="dropdown-menu  ">
                  <form class="col-md-12 " style="margin:auto" method="POST" action="login2.php">
                    <div class="form-group">
                      
                      <label for="exampleDropdownFormEmail1">Email </label>
                      <input type="email" name="email" class="form-control col-md-12" id="exampleDropdownFormEmail1" placeholder="nome@example.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleDropdownFormPassword1">Password</label>
                      <input type="password" name="senha" class="form-control col-md-12" id="exampleDropdownFormPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">

                    </div>
                    <button type="submit" class="btn btn-info">Entrar</button>
                    <a href="criarUsuario.php"  style="margin-top:10px ; color: white; text-transform: capitalize;" type="submit" class="btn btn-info">cadastrar</a>
                  </form>

                </div>
              <?php else : ?>
                
                <a type="submit" onclick="return confirm('Tens a certeza que deseja Sair?')" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" href="logout2.php" class='btn btn-secondary nav-item nav-link'>
               <?php echo $nomeUsuario ?> 
               
                </a>

              <?php endif; ?>


              <!--<a class="nav-item nav-link" href="#"><i class="fa fa-sign-out" style="font-size:15px"></i> Logout</a>-->
              </div>
          </div>
      </nav>
    </div>
  </header>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>