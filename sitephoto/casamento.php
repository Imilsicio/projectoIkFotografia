<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("conexao.php");

    $adm  = $_SESSION["usuario"][1];
    $nomeUsuario = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.php'</script>";
}


require 'conexao.php';


$sql = "SELECT * FROM cliente inner join usuario  on usuario.id=cliente.idcliente where evento='casamento'";
$statement = $connection->prepare($sql);
$statement->execute();
$cliente = $statement->fetchAll(PDO::FETCH_OBJ);


$sql = "SELECT COUNT(*) FROM cliente where status ='pendente' and evento='casamento'";
$statement = $connection->prepare($sql);
$statement->execute();
$countPendente = $statement->fetchColumn();

$sql = "SELECT COUNT(*) FROM cliente where status ='activo' and evento='casamento'";
$statement = $connection->prepare($sql);
$statement->execute();
$countActivo = $statement->fetchColumn();

$sql = "SELECT COUNT(*) FROM cliente where status ='feito' and evento='casamento'";
$statement = $connection->prepare($sql);
$statement->execute();
$countfeito = $statement->fetchColumn();

$sql = "SELECT COUNT(*) FROM cliente where evento='casamento'";
$statement = $connection->prepare($sql);
$statement->execute();
$countCliente = $statement->fetchColumn();





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

                    <li>


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
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestão</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Marcações</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Pendentes</th>
                                            <th>Activos</th>
                                            <th>Feitos</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <th><?php echo $countPendente; ?></th>
                                            <th><?php echo $countActivo; ?></th>
                                            <th><?php echo $countfeito; ?></th>
                                            <th><?php echo $countCliente; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">


                    <div class="container mb-3 ">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card ">
                                    <div class="card-header ">
                                        <h3 class="card-title">Cliente</h3>
                                    </div>



                                    <table style="text-align: center;" class="table table-hover ">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Evento</th>
                                            <th>Data Marcacao</th>
                                            <th>Data realizacao </th>
                                            <th>Estado</th>
                                            <th>Acção</th>
                                        </tr>
                                        <?php foreach ($cliente as $person) : ?>
                                            <tr>

                                                <td><a  href="detalhescliente.php?id=<?= $person->idcliente ?>"><?= $person->nomeUsuario ?></a></td>
                                                <td><?= $person->evento; ?></td>
                                                <td><?= $person->datamarc; ?></td>
                                                <td><?= $person->data; ?></td>
                                                <td>
                                                    <?php if ($person->status == "feito") : ?>
                                                        <span class="badge badge-success"><?= $person->status; ?></span>
                                                    <?php elseif ($person->status == "pendente") : ?>
                                                        <span class="badge badge-warning"><?= $person->status; ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info"><?= $person->status; ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td> <a href="editar.php?id=<?= $person->idc ?>" class="btn btn-info">Editar</a>

                                                    <a onclick="return confirm('Tens a certeza que deseja apagar?')" href="remover.php?id=<?= $person->idc ?>" class='btn btn-danger'>Remover</a>
                                                    </button>
                                                </td>


                                            <?php endforeach; ?>
                                            </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                
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
    <?php elseif ($adm == 2) : ?>



        <?php

        $usuario = $_SESSION["usuario"];




        $sql = "SELECT * FROM cliente c inner join usuario u on c.idcliente=u.id WHERE evento='casamento'and fotografo='$usuario[1]'";

        $statement = $connection->prepare($sql);
        $statement->execute();
        $mm = $statement->fetchAll(PDO::FETCH_OBJ);




        $sql = "SELECT COUNT(*) FROM cliente where status ='activo' and fotografo='$usuario[1]' and evento='casamento'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $countActivo = $statement->fetchColumn();

        $sql = "SELECT COUNT(*) FROM cliente where status ='pendente' and fotografo='$usuario[1]' and evento='casamento'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $countPendente = $statement->fetchColumn();

        $sql = "SELECT COUNT(*) FROM cliente where status ='feito' and fotografo='$usuario[1]' and evento='casamento'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $countfeito = $statement->fetchColumn();

        $sql = "SELECT COUNT(*) FROM cliente where  fotografo='$usuario[1]' and evento='casamento'";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $countCliente = $statement->fetchColumn();


        ?>









        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header ">
                    <h3 class="col-md-auto"><a href="">IK Fotografia</a></h3>
                </div>

                <ul class="list-unstyled components">
                    <p style="text-align: center;">Bem-Vindo <span style="font-weight:400 ; text-transform: capitalize;"><?php echo $nomeUsuario; ?></span></p>
                    <li>
                        <a href="Dashboard.php">Dashboard Fotografo</a>
                    </li>

                    <li>


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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Marcações</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Pendentes</th>
                                            <th>Activos</th>
                                            <th>Feitos</th>
                                            <th>Total</th>
                                        </tr>
                                        <tr>
                                            <th><?php echo $countPendente; ?></th>
                                            <th><?php echo $countActivo; ?></th>
                                            <th><?php echo $countfeito; ?></th>
                                            <th><?php echo $countCliente; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">


                    <div class="container mb-3 ">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card ">
                                    <div class="card-header ">
                                        <h3 class="card-title">Cliente</h3>
                                    </div>



                                    <table style="text-align: center;" class="table table-hover ">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Evento</th>
                                            <th>Data Marcacao</th>
                                            <th>Data realizacao </th>
                                            <th>Estado</th>
                                            <th>Acção</th>
                                        </tr>
                                        <?php foreach ($mm as $person) : ?>
                                            <tr>

                                                <td><a  href="detalhescliente.php?id=<?= $person->idcliente ?>"><?= $person->nomeUsuario ?></a></td>
                                                <td><?= $person->evento; ?></td>
                                                <td><?= $person->datamarc; ?></td>
                                                <td><?= $person->data; ?></td>
                                                <td>
                                                    <?php if ($person->status == "feito") : ?>
                                                        <span class="badge badge-success"><?= $person->status; ?></span>
                                                    <?php elseif ($person->status == "pendente") : ?>
                                                        <span class="badge badge-warning"><?= $person->status; ?></span>
                                                    <?php else : ?>
                                                        <span class="badge badge-info"><?= $person->status; ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="editar.php?id=<?= $person->idc ?>" class="btn btn-info">Editar</a>
                                                    </button>
                                                </td>


                                            <?php endforeach; ?>
                                            </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <?php echo "<script>window.location = 'index.html'</script>"; ?>
    <?php endif; ?>


</body>

</html>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>