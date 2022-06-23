<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nomeUsuario = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.html'</script>";
}

require 'conexao.php';
$sql = 'SELECT * FROM  usuario ';
$statement = $connection->prepare($sql);
$statement->execute();
$cliente = $statement->fetchAll(PDO::FETCH_OBJ);
$message = '';
if (isset($_POST['id']) && isset($_POST['evento']) && isset($_POST['pacote']) && isset($_POST['data']) && isset($_POST['texto'])) {
    $id = $_POST['id'];

    $evento = $_POST['evento'];
    $pacote = $_POST['pacote'];
    $data = $_POST['data'];

    $texto = $_POST['texto'];



    $sql = "INSERT INTO cliente(idcliente,evento, pacote,data,texto, status, datamarc) VALUES(:id,:evento, :pacote,:data,:texto,'pendente',Now())";
    $statement = $connection->prepare($sql);
    if (
        $statement->execute([':id' => $id, ':evento' => $evento, ':pacote' => $pacote, ':data' => $data,  ':texto' => $texto])
    ) {
        $message = 'Cliente inserido';
    }
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
            <!-- Page Content  -->
            <div id="content">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span></span>
                </button>



                <div class="container mb-3">

                    <form method="POST">
                        <div class="container my-4">
                            <?php if (!empty($message)) : ?>
                                <div class="alert alert-success">
                                    <?= $message; ?>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Adicionar Marcação</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationServer01">Nome Cliente</label>

                                                    <select class="custom-select " id="validationServer04" name="id" aria-describedby="validationServer04Feedback" required>
                                                        <?php foreach ($cliente as $person) : ?>
                                                            <option value="<?= $person->id ?>"><?= $person->nomeUsuario ?></option>

                                                        <?php endforeach; ?>

                                                    </select>

                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="validationServer04">Evento</label>
                                                    <select class="custom-select " id="validationServer04" name="evento" aria-describedby="validationServer04Feedback" required>
                                                        <option value="Shoot">Shoot</option>
                                                        <option value="Casamento">Casamento</option>
                                                        <option value="Outros">Outros</option>

                                                    </select>

                                                </div>

                                                <div class="col-md-3 mb-3">
                                                    <label for="validationServer04">Pacote</label>
                                                    <select class="custom-select " id="validationServer04" name="pacote" aria-describedby="validationServer04Feedback" required>
                                                        <option value="Basic">Basic</option>
                                                        <option value="Normal">Normal</option>
                                                        <option value="Plus">Plus</option>

                                                    </select>

                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="date">Data </label>
                                                    <input type="date" class="date form-control" placeholder="data" name="data" id="data" required>
                                                </div>


                                                <div class="form-group col-md-3 mb-3">
                                                    <label for="validationServer03">Texto</label>
                                                    <input type="text-area" class="form-control" id="validationTextarea" name="texto" aria-describedby="validationServer03Feedback" required>

                                                </div>

                                            </div>
                                            <button class="btn btn-info" type="submit">Adicionar</button>
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
        <?php echo "<script>window.location = 'indexx.'</script>"; ?>
    <?php endif; ?>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>