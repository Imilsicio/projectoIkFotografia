<?php

session_start();
require 'conexao.php';
require 'header.php';
$usuario = $_SESSION["usuario"];
$nomeUsuario = $_SESSION["usuario"][0];

$sql = "SELECT * FROM cliente inner join  usuario  on usuario.id=cliente.idcliente WHERE email ='$usuario[2]'";


$statement = $connection->prepare($sql);
$statement->execute();

$cliente = $statement->fetchAll(PDO::FETCH_OBJ);







?>
<div class="container  col-md-6">
    <div class="card mt-5">
        <div class="card-header ">
            <table class="table table-hover">
                <tr>
                    <th>Email</th>
                    <th>Nome do Usuario</th>
                    <th>Estado</th>
                </tr>
                
                <h2><?php echo $nomeUsuario; ?></h2>
            </table>
        </div>
    </div>
</div>
<div class="container  col-md-6">
    <div class="card mt-5">
        <div class="card-header ">
            <h2><?php echo $nomeUsuario; ?></h2>
        </div>
        <div class="card-body">
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <table class="table table-hover">
                <tr>
                    <th>Evento</th>
                    <th>Data da Marcacao</th>
                    <th>Data da Realizacao</th>
                    <th>Estado</th>
                </tr>
                <?php foreach ($cliente as $person) : ?>
                    <tr>
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
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>